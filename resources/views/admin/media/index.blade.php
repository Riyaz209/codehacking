@extends('layouts.admin')

@section('title', 'Media')


@section('content')

	@if(Session::has('deleted_photo'))
				
		<p class="bg-danger">{{session('deleted_photo')}}</p>
			
	@endif

	<h1>Media</h1>
	
	@if($photos)
		
		<form action="delete/media" method="POST" class="form-inline">
		
		{{csrf_field()}}
		
		{{method_field('delete')}}
		
		<div class="form-group">
			<select name="checkBoxArray" id="" class="form-control">
				<option value="delete">Delete</option>
			
			</select>
		</div>
		
		<div class="form-group">
			<input type="submit" value="Delete" class="btn btn-danger">
		</div>
	
		<table class="table">
			<thead>
				<tr>
					<th><input type="checkbox" id="options"></th>
					<th>ID</th>
					<th>Name</th>
					<th>Created</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($photos as $photo)
				
				<tr>
					<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
					<td>{{$photo->id}}</td>
					<td><img height="50px" src="{{$photo->file}}" alt=""/></td>
					<td>{{$photo->created_at ? $photo->created_at : 'No Date'}}</td>
	
				</tr>
				
				@endforeach
			</tbody>
		
		</table>
		
		</form>
	
	@endif

@endsection

@section('scripts')
<script>

	$(document).ready(function(){
		
		//console.log("Hello");
		
		$("#options").click(function(){
			
			//console.log("It works");
			
			if(this.checked){
				
				$(".checkBoxes").each(function(){
					
					this.checked = true;
					
				});
				
			}else{
				
				$(".checkBoxes").each(function(){
					
					this.checked = false;
					
				});
				
			}
			
		});
		
	});

</script>

@endsection