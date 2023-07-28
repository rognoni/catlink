@extends('layouts.app')

@section('content')
<article>
    <div class="grid">
        <form action="{{ route('link_add') }}" method="POST">
            @csrf
        @if ($errors->any())
        <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif
            <div>
                <label for="url">URL</label>
                <input type="text" id="url" name="url" value="{{ old('url') }}" placeholder="https://"  maxlength="2000">
            </div>
            <div>
                <label for="category">Category path</label>
                <input type="text" id="category" name="category" value="{{ old('category') }}" placeholder="/category/sub-category/ ..."  maxlength="100">
                <small>
                    ⚠️ Remember to read carefully this
                    <a href="{{ route('guide_category') }}">guide</a>
                </small>
            </div>
            <button type="submit">Add link</button>
        </form>
    </div>
</article>
@endsection