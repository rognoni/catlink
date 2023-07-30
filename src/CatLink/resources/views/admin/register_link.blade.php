@extends('layouts.app')

@section('content')
    @isset($message)
    <p>
        <ins>{{ $message }}</ins>
    </p>
    @endisset
    <form action="{{ route('register_link') }}" method="POST">
    @csrf
        <div class="grid">
            <button type="submit" name="execute" value="generate" @isset($register_link) disabled @endisset>Generate register link</button>
        </div>
    </form>
    @isset($register_link)
    <p>
        <a href="{{ $register_link }}">{{ $register_link }}</a>
    </p>
    @endisset
@endsection