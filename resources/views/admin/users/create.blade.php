@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>

    <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('includes.form_error')
        <div class="form-group">
            <label for="name">Full Name</label>
            <input  type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input  type="text" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <option value="">Choose Options</option>
                @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_active">Status</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="0">Not Active</option>
                <option value="1">Active</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input  type="file" name="photo_id" id="photo_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input  type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="Create">Create</button>
        </div>

    </form>


    @stop
