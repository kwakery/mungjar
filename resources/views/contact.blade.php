@section('title', 'Contact Me')
@section('name', 'How to Contact Me')

@extends('layouts.app')

@section('content')
  <h2>Discord:</h2>
  <p>The fastest way to reach me is through messaging me on Discord.</p>

  <h2>Social Media:</h2>
  <p>Feel free to send me a message in the following platforms:</p>
  <div class="social center">
    <a href="{{ config('social.twitter.url') }}"><span class="social-group"><i class="fab fa-twitter" aria-hidden="true"></i> {{ config('social.twitter.name') }}</span></a>
    <a href="{{ config('social.instagram.url') }}"><span class="social-group"><i class="fab fa-instagram" aria-hidden="true"></i> {{ config('social.instagram.name') }}</span></a>
  </div>

  <h2>Email:</h2>
  <p>Fill out the following form, and I will get back to you within 48 hours.</p>
  {!! Form::open(['url' => 'contact/submit']) !!}
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'John Doe']) }}
    </div>

    <div class="form-group">
      {{ Form::label('email', 'E-Mail Address') }}
      {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'john.doe@gmail.com']) }}
    </div>

    <div class="form-group">
      {{ Form::label('message', 'Message') }}
      {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter Message']) }}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary text-center']) }}
  {!! Form::close() !!}
@endsection
