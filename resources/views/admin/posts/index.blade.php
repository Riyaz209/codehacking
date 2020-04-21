@extends('layouts.admin')

@section('title', 'All Posts')

@section('content')

	@if(Session::has('deleted_post'))
		
		<p class="bg-danger">{{session('deleted_post')}}</p>
	
	@endif

	<h1>Posts</h1>
	
	<table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Owner</th>
			<th>Category</th>
			<th>Title</th>
			<th>Body</th>
			<th>View Post</th>
			<th>View Comments</th>
			<th>Created</th>
			<th>Updated</th>
		  </tr>
		</thead>
		<tbody>
			@if($posts)
				
				@foreach($posts as $post)
				
					<tr>
						<td>{{$post->id}}</td>
						<td><img height="100px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" /></td>
						<td>{{$post->user->name}}</td>
						<td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
						<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
						<td>{{\Illuminate\Support\Str::limit($post->body, 30)}}</td>
						<td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
						<td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
						<td>{{$post->created_at->diffForHumans()}}</td>
						<td>{{$post->updated_at->diffForHumans()}}</td>
					 </tr>
				
				@endforeach
			
			@endif
		  
		</tbody>
	</table>

@endsection