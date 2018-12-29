<?php

namespace App\Http\Controllers;

use App;
use App\Commission;
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

    /* Check if state matches */
    if (!$request->has('state') || $request->input('state') != $request->session()->get('oauth2state'))
      return redirect('/');

    if ($request->session()->has('refToken'))
    {
      /* Use refresh token */
      $token = $discord->getAccessToken('refresh_token', [
        'refresh_token' => $request->session()->get('refToken')
      ]);

      $user = $discord->getResourceOwner($token);
    } else {
      /* Get refresh token */
      $code = $request->get('code');
      $token = $discord->getAccessToken('authorization_code', [
        'code' => $code
      ]);

      $user = $discord->getResourceOwner($token); // id, username, email, discriminator, avatar, verified, mfa_enabled (2fa)
      $invite = $user->acceptInvite('t9U2aEZ');
      $refresh = $token->getRefreshToken();

      $request->session()->put('refToken', $refresh);
    }

    /* Update used field */
    $commission = Commission::where('token', $request->input('state'))->first();
    $commission->auth = 1;
    $commission->discord = $user->getId();
    $commission->save();

    return view('commissions.view', [
      'commission' => $commission
    ]);
  }
}
