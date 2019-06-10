@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{route('posts.create')}}">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            List of Posts
        </div>

        <div class="card-body">

        </div>
    </div>
@endsection