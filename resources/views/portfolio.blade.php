@section('title', 'Portfolio')
@section('name', 'Portfolio')
@extends('layouts.app')

@php
	$directories = File::directories('images/portfolio');
	shuffle($directories);
@endphp


@section('content')
<div class="filters text-center">
    <ul id="filter" class="filter-menu" style="padding-left: 0">
        <li class="waves-effect waves-light btn disabled" data-filter="*">All</li>
        <li class="waves-effect waves-light btn" data-filter=".traditional">Traditional</li>
        <li class="waves-effect waves-light btn" data-filter=".commission">Commissions</li>
        <li class="waves-effect waves-light btn" data-filter=".chibi1">Chibi1</li>
        <li class="waves-effect waves-light btn" data-filter=".chibi2">Chibi2</li>
        <li class="waves-effect waves-light btn" data-filter=".other">Other</li>
    </ul>
</div>

<div class="gallery_items grid">
  @foreach ($directories as $directory)
    @php $files = File::allFiles($directory); shuffle($files); @endphp
    @foreach ($files as $image)
      <div class="grid-item {{ substr(dirname($image), 17) }}@if(endsWith($directory, "chibi1") || endsWith($directory, "chibi2") || endsWith($directory, "panels")) commission @elseif (endsWith($directory, "traditional")) @else other @endif">
        <img class="activator" src="{{ $image }}">
      </div>
    @endforeach
  @endforeach
</div>
@endsection
