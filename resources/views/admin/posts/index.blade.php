@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{Session('deleted_post')}}</p>
    @endif
<h1>Posts</h1>

     <table class="table">
         <thead>
           <tr>
               <th>ID</th>
               <th>Image</th>
               <th>User</th>
               <th>Category</th>
               <th>Title</th>
               <th>Body</th>
               <th>Created</th>
               <th>Updated</th>
           </tr>
         </thead>
         <tbody>
         @if($posts)
             @foreach($posts as $post)
           <tr>
               <td>{{$post->id}}</td>
               <td><img height="50" src="{{$post->photo ? $post->photo->file :'http://placehold.it/400x400'}}"</td>
               <td>{{$post->user->name}}</td>
               <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
               <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
               <td>{{Str::limit($post->body, 10)}}</td>
               <td>{{$post->created_at->diffForhumans()}}</td>
               <td>{{$post->updated_at->diffForhumans()}}</td>
           </tr>
           @endforeach
             @endif
         </tbody>
       </table>

    @stop
