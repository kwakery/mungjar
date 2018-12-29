@section('title', 'Pricing')
@section('name', 'Pricing')

@extends('layouts.app')

@section('content')
<div id="pricing" class="text-center">
  <div id="chibi1">
    <h2>Chibi Style 1</h2>
    <img src="/images/portfolio/chibi1/1.png" alt="" width="10%">
    <ul>
      <li>$15</li>
      <li>Size around 600x800</li>
      <li>Simple Coloring</li>
      <li>Transparent background</li>
      <li>Only offering ONE character per commission.</li>
      <li>Examples are downscaled</li>
    </ul>
  </div>

  <div id="chibi2">
    <h2>Chibi Style 2</h2>
    <img src="/images/portfolio/chibi2/1.png" alt="" width="10%">
    <ul>
      <li>$15</li>
      <li>Size around 600x800</li>
      <li>Very Simple Shading</li>
      <li>Transparent background</li>
      <li>Only offering ONE character per commission.</li>
      <li>Examples are downscaled</li>
    </ul>
  </div>

  <div id="panels">
    <h2>Stream Panels</h2>
    <img src="/images/portfolio/panels/1.png" alt="" width="30%">
    <ul>
      <li>$5 EACH</li>
      <li>Size at 320x100</li>
      <li>Examples are downscaled</li>
      <li>NOTE: The examples displayed belong to <a href="https://www.deviantart.com/emperpep">emperpep</a></li>
    </ul>
  </div>
</div>
@endsection
