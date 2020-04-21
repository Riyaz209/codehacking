@extends('layouts.admin')

@section('title', 'Media')


@section('content')

	@if(Session::has('deleted_photo'))
				
		<p class="bg-danger">{{session('deleted_photo')}}</p>
			
	@endif

	<h1>Media</h1>
	
	@if($photos)
		
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Created</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($photos as $photo)
				
				<tr>
					<td>{{$photo->id}}</td>
					<td><img height="50px" src="{{$photo->file}}" alt=""/></td>
					<td>{{$photo->created_at ? $photo->created_at : 'No Date'}}</td>
					<td>
					
						{!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
				
															
							<div class="form-group">
								{!! Form::submit('Delete Photo', ['class' => 'btn btn-danger col-sm-6']) !!}
							</div>
							
						{!! Form::close() !!}
					
					</td>
				</tr>
				
				@endforeach
			</tbody>
		
		</table>
	
	@endif

@endsection