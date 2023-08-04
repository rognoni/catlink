@extends('layouts.app')

@section('head')
<!-- link rel="stylesheet" href="/CatLink/css/comments.css" -->
<style>
    .comment-list .comment {
    display: flex;
    padding: 0.5em;
    border-width: 1px;
    border-style: solid;
    border-color: var(--accent);
    border-radius: 0.5em;
    margin-bottom: 1em;
}
.comment-list .comment .avatar {
    flex-grow: 0;
    flex-shrink: 0;
    width: 70px;
}
.comment-list .comment .content {
    flex-grow: 1;
}
.comment-list .comment .author {
    width: 100%;
    display: flex;
}
.comment-list .comment .author > * {
    flex-grow: 1;
}

.comment-list .comment .author .date {
    margin-left: auto;
    text-align: right;
}
@media screen and (max-width: 850px) {
    .comment-list .comment .author {
        display: block;
    }
    .comment-list .comment .author > * {
        display: block;
    }
    .comment-list .comment .author .date {
        font-size: 0.8em;
        text-align: left;
        margin-left: 0;
    }
}
</style>
<script src="/CatLink/js/comments.js"></script>
@endsection

@section('content')
<div id="comments"></div>
<script>
addEventListener('DOMContentLoaded', (event) => window.loadComments('{{ $link->comments_link }}', document.getElementById('comments')));
</script>
@endsection
