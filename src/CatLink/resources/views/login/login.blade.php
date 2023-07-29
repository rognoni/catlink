@extends('layouts.app')

@section('content')
<article>
    <div class="grid">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if ($errors->any())
            <ul class="error">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="" maxlength="20">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder=""  maxlength="100">
                <small><b>Register:</b> You need your registration link, ask to the admin.</small>
            </div>
            <button type="submit">Login</button>
        </form>
        <div>
            <img src="{{ env('COVER_IMAGE') }}">
            Image by <a href="{{ env('COVER_IMAGE_AUTHOR_LINK') }}">{{ env('COVER_IMAGE_AUTHOR') }}</a> licensed under <a href="{{ env('COVER_IMAGE_LICENSE_LINK') }}">{{ env('COVER_IMAGE_LICENSE') }}</a>
        </div>
    </div>
</article>
@endsection