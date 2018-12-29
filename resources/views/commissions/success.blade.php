@section('title', 'Success!')
@section('name', 'Hey, you made it!')

@extends('layouts.app')

@section('content')

<div class="text-center">
  <p>Now, all you need to do is wait for me to review your commission.
     You should also <a href="{{ config('app.discord') }}">join the Discord</a> and message me.
  </p>

  <h5>Your Unique Commission URL</h5>
  <p>Don't lose this! You might need it :)</p>

  <h3><a href="{{ route('commissions.show', $token) }}">{{ route('commissions.show', $token) }}</a></h3>
  <button type="button" name="button"><a href="/connect/{{ $token }}">Connect to Discord</a></button>
  <p>Have a great day!</p>
</div>
@endsection
