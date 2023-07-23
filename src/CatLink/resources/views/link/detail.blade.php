@extends('layouts.app')

@section('head')
<meta property="og:title" content="{{ $link->title }}">
<meta property="og:description" content="{{ $link->description }}">
<meta property="og:image" content="{{ $link->og_image }}">

@endsection

@section('content')
      <hgroup>
        <h3>{{ $link->title }}</h3>
        <a href="{{ $link->link }}">{{ $link->link }}</a>
      </hgroup>
      <a href="#">🔍More</a> <code>{{ $link->category }}</code><br>
      <small>{{ $link->created_at->format('Y-m-d') }} &nbsp; 👁️{{ $link->views }}</small>
      <article>
        <div class="grid">
            <div>
                <img src="{{ $link->og_image }}">
            </div>
            <div>{{ $link->description }}</div>
        </div>
      </article>
@endsection
