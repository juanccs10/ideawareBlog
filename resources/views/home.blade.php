@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card" style="margin-bottom: 25px;">
                <div class="card-body">
                    <div class="card-title">
                        <h4><b>{{ $post->title }}</b></h4><small>By {{ $post->users->name }}</small >
                    </div>
                    <a href="{{ route('post', ['id' => $post->id])}}" class="btn btn-primary">Go post</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
