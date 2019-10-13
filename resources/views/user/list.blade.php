@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('users.create') }}" class="btn btn-success mb-2">Add</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center"><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
                        <td class="text-center">
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
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
