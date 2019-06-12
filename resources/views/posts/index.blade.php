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
            @if($posts->count() > 0 )
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

                            @if(!$post->trashed())
                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                            @endif
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{$post->trashed() ? 'Delete' : 'Trash'}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No posts yet.</h3>
            @endif
        </div>
    </div>
@endsection