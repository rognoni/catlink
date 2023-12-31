@extends('layouts.app')

@section('content')
    @isset($message)
    <p>
        <ins>{{ $message }}</ins>
    </p>
    @endisset
    <form action="{{ route('link_update', ['id' => $link->id]) }}" method="POST">
    @csrf
        <div>
            <label for="url">URL</label>
            <input type="text" name="url" value="{{ old('url', $link) }}" placeholder="https://"  maxlength="2000">
        </div>
        <div>
            <label for="category">Category path</label>
            <input type="text" name="category" value="{{ old('category', $link) }}" placeholder="/category/sub-category/ ..."  maxlength="100">
        </div>
        <div>
            <label for="html">HTML</label>
            <textarea name="html" rows="2">{{ old('html', $link) }}</textarea>
            <div class="grid">
                <button type="submit" name="execute" value="get_html" >get HTML</button>
                <button type="submit" name="execute" value="get_meta" >get meta</button>
            </div>
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $link) }}" maxlength="100">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" rows="2" maxlength="2000">{{ old('description', $link) }}</textarea>
        </div>
        <div>
            <label for="og_image">OG image</label>
            <input type="text" name="og_image" value="{{ old('og_image', $link) }}" maxlength="2000">
        </div>
        <div>
            <label for="comments_link">Comments link</label>
            <input type="text" name="comments_link" value="{{ old('comments_link', $link) }}" maxlength="2000">
        </div>
        <div>
            <label for="state">State</label>
            <input type="text" name="state" value="{{ old('state', $link) }}" maxlength="20">
        </div>
        <div class="grid">
            <button type="submit" name="execute" value="update" >update</button>
        </div>
    </form>
@endsection