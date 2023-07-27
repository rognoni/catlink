@extends('layouts.app')

@section('content')
<p>
    <a href="{{ route('link_add') }}">➕Add link</a> &nbsp;
    <a href="{{ route('logout') }}">👋Logout</a>
</p>
<p>
    Your are logged 👍 <br>
    Now you can add your first link.
</p>
@endsection