@extends('layouts.app')

@section('content')
<p>
    <a href="{{ route('admin_editor') }}">📝Editor</a> &nbsp;
    <a href="{{ route('logout') }}">👋Logout</a>
</p>
    @forelse ($links as $link)
    <p>
        <small>
            {{ $link->created_at->format('Y-m-d') }} <a href="{{ route('link_update', ['id' => $link->id]) }}">to process</a>
            {{ $link->url}}
        </small>
    </p>
    @empty
    <p>
        Your are logged 👍 <br>
        Now you can add your first link.
    </p>
    @endforelse
@endsection