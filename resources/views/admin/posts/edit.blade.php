@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$post->photo->file}}" alt="Post Image" class="img-responsive">
        </div>

        <div class="col-sm-9">

    <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        @include('includes.form_error')
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text" name="title" id="title" class="form-control" value="{{$post->title}}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input  type="file" name="photo_id" id="photo_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="body">Description</label>
            <textarea rows="6" name="body" id="body" class="form-control">{{$post->body}}</textarea>
        </div>


        <div class="form-group">
            <button class="btn btn-primary col-sm-5" type="submit" name="Update" style="width: 100px">Update</button>
        </div>

    </form>

    <form method="POST" action="{{route('posts.destroy', $post->id)}}">
        {{ csrf_field() }}
        @method('DELETE')
        <div class="form-group col-sm-2"></div>
        <div class="form-group">
            <button type="submit" name="Delete" class="btn btn-danger col-sm-5" style="width: 100px">Delete</button>
        </div>
    </form>
        </div>

    </div>
@stop
