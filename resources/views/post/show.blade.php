@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="jumbotron" style="width:100%">
            <h1 class="display-4">{{ $post->title }}</h1>
            <p class="lead">{{ $post->content }}</p>
            <hr class="my-4">
            @foreach($post->tags as $tag)
            <span class="badge badge-primary">{{$tag->name}}</span>
            @endforeach
            <p>By {{ $post->users->name }} creado el {{$post->created_at}}</p>
        </div>
    </div>
</div>
@endsection
