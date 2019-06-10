@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{route('categories.create')}}">Add Category</a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            List of Categories
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->name}}

                            <a class="btn btn-danger float-right" href="{{route('categories.edit', $category->id)}}">Edit
                                Category</a>

                            <!-- The modal -->
                            <button type="button" class="btn btn-primary float-right mx-2" data-toggle="modal"
                                    data-target="#delete">
                                Delete
                            </button>
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modalLabel">Deletion</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                @csrf
                                                <button class="btn btn-success">
                                                    Confirm
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection