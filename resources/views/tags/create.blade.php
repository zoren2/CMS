@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{isset($tag) ? 'Edit Tag' : 'Create tag'}}
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form action="{{isset($tag) ? route('categories.update', $tag->id) : route('categories.store')}}"
                  method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                           value="{{isset($tag->name) ? $tag->name : ''}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{isset($tag) ? 'Update Tag' : 'Create Tag'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection