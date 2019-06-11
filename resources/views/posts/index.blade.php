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
            <table class="table">
                <thead>
                <th>Image</th>
                <th>Title</th>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{asset('storage/'.$post->image)}}" width="60px" height="60px" alt="">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection