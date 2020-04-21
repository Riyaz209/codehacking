@extends('layouts.admin')

@section('title', 'Upload Media')

@section('styles')

	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" rel="stylesheet">

@endsection

@section('content')

	<h1>Upload Media</h1>
	
	{!! Form::open(['method' => 'POST', 'action' => 'AdminMediasController@store', 'class' => 'dropzone']) !!}
				
									
	{!! Form::close() !!}
	

@endsection

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

@endsection