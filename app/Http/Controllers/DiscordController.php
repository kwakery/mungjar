<?php

namespace App\Http\Controllers;

use App;
use App\Commission;
use App\Task;
use \Wohali\OAuth2\Client\Provider\Discord;
use Illuminate\Http\Request;

class DiscordController extends Controller
{
  public function app(Request $request, $token)
  {
    $commission = Commission::where('token', $token)->firstOrFail();
    if ($commission->used == 1)
      return redirect('/');

    $discord = App::make(Discord::class);

    if (!$request->has('code')) {
      $options = [
        'state' => $token,
        'scope' => ['identify', 'email', 'guilds.join'] // array or string
      ];

      $authURL = $discord->getAuthorizationUrl($options);

      session(['oauth2state' => $discord->getState()]);
      $request->session()->forget('refToken');

      return redirect($authURL);
    }
  }

  public function register(Request $request)
  {
    $discord = App::make(Discord::class);
    $cToken = $request->input('state');
    $code = $request->get('code');

    /* Check if state matches */
    if (!$request->has('state') || $request->input('state') != $request->session()->get('oauth2state'))
      return redirect('/');

    /* Auth */
    if ($request->session()->has('refToken'))
      $token = $discord->getAccessToken('refresh_token', [ // Use refresh token
        'refresh_token' => $request->session()->get('refToken')
      ]);
    else
      $token = $discord->getAccessToken('authorization_code', [ // Get new token
        'code' => $code
      ]);

    /* Create resource owner object and join server */
    $user = $discord->getResourceOwner($token);
    $invite = $user->acceptInvite('t9U2aEZ');
    $refresh = $token->getRefreshToken();

    $request->session()->put('refToken', $refresh); // Store ref token for next time

    /* Update used field */
    $commission = Commission::where('token', $cToken)->first();
    if ($commission->auth)
      return redirect('/commissions/'.$cToken);

    $commission->auth = true;
    $commission->discord = $user->getId();
    $commission->save();

    /* Add new task */
    $task = new Task();
    $task->commission_token = $cToken;
    $task->save();

    return redirect('/commissions/'.$cToken)->with([
      'commission' => $commission,
      'success' => "Successfully linked Discord!"
    ]);
  }
}
