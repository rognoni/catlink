@extends('layouts.app')

@section('content')
<form action="{{ route('home') }}">

  <label for="category">Category</label>
  <input type="text" id="category" name="c" value="{{ $category}}" placeholder="Type word or /category">
  <small>Start with <code>/</code> to search absolute path or remove it for relative path</small>

  <label for="Search">Search</label>
  <input type="text" id="search" name="s" value="{{ $search}}">
  <small>Use boolean full-text search <a href="https://www.mysqltutorial.org/mysql-boolean-text-searches.aspx/">operators</a></small>

  <button type="submit">Search</button>

</form>

@endsection