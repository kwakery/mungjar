@section('title', 'Success!')
@section('name', 'Hey, you made it!')

@extends('layouts.app')

@section('content')

<div class="text-center">
  <p>Now, all you need to do is wait for me to review your commission. <br />
     I <em>highly</em> recommend that you click the button below to connect with Discord so that we can have a quicker way to communicate.<br />
     <a href="/connect/{{ $token }}"><button class="btn btn-lg" id="discordBtn" type="button"><i class="fab fa-discord"></i></button></a>
  </p>

  <h5>Your Unique Commission URL</h5>
  <p>Don't lose this! You might need it :)</p>

  <h3><a href="{{ route('commissions.show', $token) }}">{{ route('commissions.show', $token) }}</a></h3>
  <p>Have a great day!</p>
</div>
@endsection
