<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show() {
      return view('contact');
    }

    public function submit(Request $request) {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
      ]);

      // Create Message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');

      $message->save();

      // TODO: add user to "queue" and have bot make separate commission channel.
      // Redirect
      return redirect('/')->with('success', 'Message Sent');
    }
}
