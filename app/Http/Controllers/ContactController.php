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

      // Send Message to server
      $message_string = "{$message->name} has sent you a message:\n```{$message->message}```\nEmail: {$message->email}\n@everyone";
      sendMessage($message_string);

      // Redirect
      return redirect('/')->with('success', 'Message Sent');
    }
}
