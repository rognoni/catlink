@extends('layouts.app')

@section('content')
    @isset($message)
    <p>
        <ins>{{ $message }}</ins>
    </p>
    @endisset
    <form action="{{ route('admin_editor') }}" method="POST">
    @csrf
        <div>
            <label for="filename">Filename</label>
            <input type="text" name="filename" value="{{ $filename }}">
            <small>The path/filename of the file to edit.</small>
        </div>
        <div>
            <label for="filetext">File text</label>
            <textarea name="filetext" class="form-control" rows="10">{{ $filetext }}</textarea>
        </div>
        <div class="grid">
            <button type="submit" name="execute" value="open" >Open</button>
            <button type="submit" name="execute" value="save" >Save</button>
        </div>
    </form>
@endsection