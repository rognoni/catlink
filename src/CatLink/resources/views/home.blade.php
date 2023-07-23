@extends('layouts.app')

@section('content')
      <p>
        <a href="#">Category</a> <code>{{ $category }}</code><br>
        <a href="#">🔍Search</a> <code>{{ $search }}</code>
      </p>
      @foreach ($links as $link)
      <p>
        <a href="{{ route('link_detail', ['id' => $link->id]) }}">{{ $link->title }}</a><br>
        <code>{{ $link->category }}</code><br>
        <small>{{ $link->created_at->format('Y-m-d') }} &nbsp; 👁️{{ $link->views }}</small>
      </p>
      @endforeach
@endsection
