@extends('layouts.app')

@section('content')
<article>
    <div class="grid">
        <form action="{{ route('register', ['token' => $token]) }}" method="POST">
            @csrf
        @if ($errors->any())
        <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{{ old('username') }}}" placeholder="" maxlength="20">
                <small>This is the profile name, for example <b>@laravista</b></small>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{{ old('password') }}}" placeholder=""  maxlength="100">
                <small>Choose your password and remember it.</small>
            </div>
            <div>
                <label for="profile_link">Profile link</label>
                <input type="text" id="profile_link" name="profile_link" value="{{{ old('profile_link') }}}" placeholder="https://"  maxlength="2000">
                <small>What is your personal homepage, blog or social profile?</small>
            </div>
            <button type="submit">Register</button>
        </form>
        <div>
            <img src="{{ env('COVER_IMAGE') }}">
            Image by <a href="{{ env('COVER_IMAGE_AUTHOR_LINK') }}">{{ env('COVER_IMAGE_AUTHOR') }}</a> licensed under <a href="{{ env('COVER_IMAGE_LICENSE_LINK') }}">{{ env('COVER_IMAGE_LICENSE') }}</a>
        </div>
    </div>
</article>
@endsection