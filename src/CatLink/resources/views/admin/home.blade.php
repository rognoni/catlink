@extends('layouts.app')

@section('content')
<p>
    <a href="{{ route('admin_editor') }}">📝Editor</a> &nbsp;
    <a href="{{ route('register_link') }}">®️Register</a> &nbsp;
    <a href="{{ route('logout') }}">👋Logout</a>
</p>
    @foreach ($links as $link)
    <p>
        <small>
            {{ $link->created_at->format('Y-m-d') }} <a href="{{ route('link_update', ['id' => $link->id]) }}">to process</a>
            @isset($link->user)
                added by <a href="{{ $link->user->profile_link }}">{{ '@' . $link->user->username }}</a>
            @endisset
            {{ $link->url}}
        </small>
    </p>
    @endforeach
@endsection