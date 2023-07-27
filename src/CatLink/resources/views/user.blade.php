@extends('layouts.app')

@section('content')
<p>
    <a href="{{ route('link_add') }}">➕Add link</a> &nbsp;
    <a href="{{ route('logout') }}">👋Logout</a>
</p>
    @if(!$links->isEmpty())
    <p>
        ⚠️ You have to wait for the web-crowler to process your links before they are public, usually a few days.
    </p>
    @endif
    @forelse ($links as $link)
    <p>
        <small>
        @if ($link->state == 'to process')
            {{ $link->created_at->format('Y-m-d') }} <b style="background-color: yellow">to process</b>
            {{ $link->url}}
        @endif

        @if ($link->state == 'active')
            {{ $link->created_at->format('Y-m-d') }} <b style="color: green">active</b>
            <a href="{{ route('link_detail', ['id' => $link->id]) }}">{{ $link->title }}</a>
        @endif
        </small>
    </p>
    @empty
    <p>
        Your are logged 👍 <br>
        Now you can add your first link.
    </p>
    @endforelse
@endsection