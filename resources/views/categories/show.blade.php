@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit category
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('categories.update', $category->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$category->name}}">
                </div>

                <div class="form-group">
                    <a href="{{route('categories.update', $category->id)}}" class="btn btn-danger">Edit
                        Category</a>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection