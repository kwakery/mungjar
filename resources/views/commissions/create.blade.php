@section('title', 'Commission')
@section('name', 'Make a Commission')

@extends('layouts.app')

@section('content')
  <h1>STOP.</h1>
  <p>Before proceeding, please read my <a href="/tos">Terms of Service</a> and <a href="/pricing">Pricing</a>.
  <p>If you do not connect via Discord, I will contact you through email.</p>

  <p class="text-muted">Fields marked with * are required.</p>
  {!! Form::open(['url' => 'commissions']) !!}
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
      <p>Type</p>
      {{ Form::radio('type', '0', true) }}
      {{ Form::label('type', 'Chibi') }}

      {{ Form::radio('type', '1', false) }}
      {{ Form::label('type', 'Chibi 2') }}

      {{ Form::radio('type', '2', false) }}
      {{ Form::label('type', 'Panels') }}

      {{ Form::radio('type', '3', false) }}
      {{ Form::label('type', 'Other (Specify in Additional Information)') }}
    </div>

    <div class="form-group">
      <p>Are you going to be using the work for commercial use? <a href="/faq#commercial-use">(Click here to make sure)</a>*</p>
      {{ Form::radio('commercial', '1', true) }}
      {{ Form::label('commercial', 'Yes') }}

      {{ Form::radio('commercial', '0', false) }}
      {{ Form::label('commercial', 'No') }}
    </div>

    <div class="form-group">
      {{ Form::label('info', 'Additional Info (Poses, Important features, etc.) *') }}
      {{ Form::textarea('info', '', ['class' => 'form-control', 'placeholder' => 'Enter Message']) }}
    </div>

    <div class="form-group">
      {{ Form::checkbox('tos', '1') }}
      <label class="form-check-label" for="tos">By checking this box, I read and agree to the <a href="/tos">Terms of Service.</a></label>
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

@endsection
