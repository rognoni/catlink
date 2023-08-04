@extends('layouts.app')

@section('head')
<meta name="description" content="{{ $link->description }}">

<meta property="og:title" content="{{ $link->title }}">
<meta property="og:description" content="{{ $link->description }}">
<meta property="og:image" content="{{ $link->og_image }}">

<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="laravista.altervista.org">
<meta property="twitter:url" content="{{ $link->url }}">
<meta name="twitter:title" content="{{ $link->title }}">
<meta name="twitter:description" content="{{ $link->description }}">
<meta name="twitter:image" content="{{ $link->og_image }}">
@endsection

@section('content')
      <hgroup>
        <h3>{{ $link->title }}</h3>
        <a href="{{ $link->url }}">{{ $link->url }}</a>
      </hgroup>
      <a href="{{ route('home', ['c' => $link->category]) }}">🔍More</a> <code>{{ $link->category }}</code><br>
      <small>
        {{ $link->created_at->format('Y-m-d') }} &nbsp;
        👁️{{ $link->views }} &nbsp;
        <a href="{{ route('html', ['id' => $link->id]) }}">HTML</a> &nbsp;
        @isset($link->comments_link) 💬<a href="{{ route('comments', ['id' => $link->id]) }}">comments</a> @endisset
      </small>
      <article>
        <div class="grid">
            <div>
                <img src="{{ $link->og_image }}">
            </div>
            <div>{{ $link->description }}</div>
        </div>
      </article>
@endsection
