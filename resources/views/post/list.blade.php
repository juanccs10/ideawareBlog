@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">User</th>
                        <th scope="col" class="text-center">Creation Date</th>
                        <th colspan="2" scope="col" class="text-center">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td class="text-center">{{ $post->title }}</td>
                        <td class="text-center">{{ $post->users->name }}</td>
                        <td class="text-center">{{ $post-> created_at}} </td>
                        <td class="text-center"><a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a></td>
                        <td class="text-center">
                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
