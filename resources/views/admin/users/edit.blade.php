@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">
    <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        @include('includes.form_error')
        <div class="form-group">
            <label for="name">Full Name</label>
            <input  type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input  type="text" name="email" id="email" class="form-control" value="{{$user->email}}" required>
        </div>

        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{$role->id == $user->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_active">Status</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="1" {{$user->is_active == 1 ? 'selected' : ''}}>Active</option>
                <option value="0" {{$user->is_active == 0 ? 'selected' : ''}}>Not Active</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input  type="file" name="photo_id" id="photo_id" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input  type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-primary col-sm-5" type="submit" name="Create User" style="width: 100px">Update</button>
        </div>

    </form>
        <form method="POST" action="{{route('users.destroy', $user->id)}}">
            {{ csrf_field() }}
            @method('DELETE')
            <div class="form-group col-sm-2"></div>
            <div class="form-group">
                <button type="submit" name="Delete" class="btn btn-danger col-sm-5" style="width: 100px">Delete</button>
        </div>
        </form>

    </div>


@stop
