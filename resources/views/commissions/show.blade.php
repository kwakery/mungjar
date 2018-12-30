@section('title', 'Success!')

@extends('layouts.app')

@section('content')

<div class="text-center">
  <h2>Commission #{{ $commission->id }}</h2>
  <ul>
    <li><b>Status:</b> {{ getStatus($commission->status) }}</li>
    <li><b>Name:</b> {{ $commission->name }}</li>

    <li><b>PayPal:</b> {{ censor($commission->email) }}</li>

    <li><b>Requested Deadline:</b> {{ $commission->duedate }}</li>

    <li><b>Commission Type:</b> {{ getCType($commission->type) }}</li>

    <li><b>Commercial Use?</b> {{ $commission->type ? 'Yes' : 'No' }}</li>

    <li><b>Any Additional Comments:</b></li>
    <kbd>{{ $commission->info }}</kbd>
  </ul>

  <p>
    Am I taking too long? <br />
    <a href="/contact">Contact me and I'll get back to you ASAP with what's going on.</a>
  </p>
</div>
@endsection
