@extends('layouts.blog-post')


@section('content')

	<!-- Blog Post -->

	<!-- Title -->
	<h1>{{$post->title}}</h1>

	<!-- Author -->
	<p class="lead">
		by <a href="#">{{$post->user->name}}</a>
	</p>

	<hr>

	<!-- Date/Time -->
	<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

	<hr>

	<!-- Preview Image -->
	<img class="img-responsive" src="{{$post->photo->file}}" alt="">

	<hr>

	<!-- Post Content -->
	<p>{{$post->body}}</p>
	
	<hr>
	
	@if(Session::has('comment_message'))
		
		{{session('comment_message')}}
		
	@endif

	<!-- Blog Comments -->

	@if(Auth::check())
	<!-- Comments Form -->
	<div class="well">
		<h4>Leave a Comment:</h4>
		<!--c<form role="form">
			<div class="form-group">
				<textarea class="form-control" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>-->
		
		
		{!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store', 'files' => true]) !!}
		
			<input type="hidden" name="post_id" value="{{$post->id}}">
			
			<div class="form-group">
				{!! Form::label('body', 'Comment:') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 6]) !!}
			</div>
							
			<div class="form-group">
				{!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
			</div>
		
		{!! Form::close() !!}
		
	</div>
	
	@endif

	<hr>

	<!-- Posted Comments -->

	<!-- Comment -->
	@if(count($comments) > 0)
		@if(Session::has('reply_message'))
						
			{{session('reply_message')}}
			
		@endif
		@foreach($comments as $comment)
			
			<div class="media">
				<a class="pull-left" href="#">
					<img height="64px" class="media-object" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64'}}" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">{{$comment->author}}
						<small>{{$comment->created_at->diffForHumans()}}</small>
					</h4>
					<p>{{$comment->body}}</p>
					
					<!-- Nested Comment -->
						<button class="toggle-reply btn btn-success pull-right">Show/Hide Replies</button>
						@if(count($comment->replies) > 0)
							<div class="comment-reply-container">
								
								
								@foreach($comment->replies as $reply)
									
									@if($reply->is_active == 1)
										<div class="nested-comment media">
											<a class="pull-left" href="#">
												<img height="64px" class="media-object" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/64x64'}}" alt="">
											</a>
											<div class="media-body">
												<h4 class="media-heading">{{$reply->author}}
													<small>{{$reply->created_at->diffForHumans()}}</small>
												</h4>
												<p>{{$reply->body}}</p>
											</div>
											
											
										</div>
									@endif
								@endforeach
							</div>
						@endif
					<!-- End Nested Comment -->
					
					<button class="toggle-reply-form btn btn-info pull-right">Reply</button>
					<div class="comment-reply">
						{!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
			
						<input type="hidden" name="comment_id" value="{{$comment->id}}">
						
						<div class="form-group">
							{!! Form::label('body', 'Reply:') !!}
							{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) !!}
						</div>
										
						<div class="form-group">
							{!! Form::submit('Submit Reply', ['class' => 'btn btn-info']) !!}
						</div>
							
						{!! Form::close() !!}
				
					</div>
					
				</div>
				
				
				
				
			</div>
			
		@endforeach

	@endif

	
	
@endsection

@section('scripts')

	<script>
		
		//alert("Hi");
		
		$(".toggle-reply").click(function(){
			
			//alert("Hi");
			$(this).siblings(".comment-reply-container").toggle();
			
			//One more way to do it.
			//$(this).next().toggle();
			
		});
		
		$(".toggle-reply-form").click(function(){
			
			//alert("Hi");
			//$(this).siblings(".comment-reply-container").slideToggle('slow');
			
			//One more way to do it.
			$(this).next().toggle();
			
		});
		
	</script>

@endsection