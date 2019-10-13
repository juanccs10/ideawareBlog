@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('store-post') }}" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea name="content" class="form-control" placeholder="Enter Content" rows="4"></textarea>
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tags</strong><br>

                            @foreach ($tags as $key => $value)
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="tags[]" class="form-check-input" value="{{ $key }}">{{ $value }}
                                </label>
                            </div>
                            @endforeach

                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
