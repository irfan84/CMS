@extends('layouts.admin')

@section('content')

    <h1>Create Post</h1>

    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('includes.form_error')
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input  type="file" name="photo_id" id="photo_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="body">Description</label>
            <textarea rows="6" name="body" id="body" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="Create">Create</button>
        </div>

    </form>


@stop
