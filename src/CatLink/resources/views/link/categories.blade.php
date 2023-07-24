@extends('layouts.app')

@section('content')
<form action="{{ route('categories') }}">

  <label for="search">Search category</label>
  <input type="text" id="search" name="search" value="{{ $search}}" placeholder="Type word or /category">
  <small>Search and Click one of the categories below</small>

  <button type="submit">Search</button>

</form>

@foreach ($links as $link)
      <p>
        <a href="{{ route('search', ['c' => $link->category]) }}">🔍<code>{{ $link->category }}</code></a>
      </p>
@endforeach

@endsection