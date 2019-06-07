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
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$category->name}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection