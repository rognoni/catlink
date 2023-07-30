@extends('layouts.app')

@section('content')
<form action="{{ route('categories') }}">

  <label for="search">
    Search category
    (<a href="{{ route('guide_category') }}">guide</a>)
  </label>
  <input type="text" id="search" name="search" value="{{ $search}}" placeholder="Type word or /category">
  <small>Search and Click one of the categories below</small>

  <button type="submit">Search</button>

</form>

@foreach ($folders as $folder)
<details>
  <summary>📁({{ count($folder['categories']) }}) /{{ $folder['name'] }} ...</summary>
  <div>
    @foreach ($folder['categories'] as $category)
    <p><a href="{{ route('search', ['c' => $category]) }}">🔍<code>{{ $category }}</code></a></p>
    @endforeach
  </div>
</details>
@endforeach

@endsection