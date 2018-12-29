@section('title', 'Commission')
@section('name', 'Make a Commission')

@extends('layouts.app')

@section('content')
  <h1>STOP.</h1>
  <p>Before proceeding, please read my <a href="/tos">Terms of Service</a> and <a href="/pricing">Pricing</a>.
  <p>If you do not connect via Discord, I will contact you through email.</p>

  <p class="text-muted">Fields marked with * are required.</p>
  {!! Form::open(['url' => 'commissions/add']) !!}
    <div class="form-group">
      {{ Form::label('name', 'Name *') }}
      {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'John Doe']) }}
    </div>

    <div class="form-group">
      {{ Form::label('email', 'PayPal E-Mail Address *') }}
      {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'john.doe@gmail.com']) }}
    </div>

    <div class="form-group">
      {{ Form::label('duedate', 'Date Needed By *') }}
      {{ Form::text('duedate', '', ['class' => 'form-control', 'placeholder' => 'ASAP | 1/31/19']) }}
    </div>

    <div class="form-group">
      {{ Form::label('message', 'Additional Info (Poses, Important features, etc.) *') }}
      {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter Message']) }}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

@endsection
