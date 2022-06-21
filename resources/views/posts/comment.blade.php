
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>All Comments </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/comment.css')}}">

</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	
<div class="be-comment-block">
	<div>
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
		@endif
	</div>
	<a  class="btn btn-primary pull-right" href="{{route('home')}}"> Return to home </a>

	<h1 class="comments-title">Comments ({{count($comments)}})</h1>

	@if (count($comments)== 0)
		<div class="be-comment">
			
			<div class="be-comment-content">

				<p class="be-comment-text">
					
				There is No Comments Here Now ...
				</p>
			
			</div>
		</div>
		@else
		@foreach($comments as $comment)
		<div class="be-comment">
			<div class="be-img-comment">
				<a href="#">
					@if($comment->user->image != null)
					<img class="be-ava-comment" src="{{asset('storage/'.$comment->user->image)}}"
						alt="profile">
					@else
					<img class="be-ava-comment" src="{{asset('auth/images/hamada.png')}}"
						alt="profile">
					@endif
					
				</a>
			</div>
			<div class="be-comment-content">
	
					<span class="be-comment-name">
						<a href="blog-detail-2.html">{{$comment->user->username}}</a>
						</span>
					<span class="be-comment-time">
						<i class="fa fa-clock-o"></i>
						{{$comment->updated_at->format('y-m-d || h:m')}}
					</span>
					@if (auth()->user()->id == $comment->user->id )
						<form method="POST" action="{{route('comment.destroy', $comment->id)}}">
							@csrf
							@method('delete')
							<button class="btn btn-link pull-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
								<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
								<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							  </svg> </button>
						</form>
						@endif
					
	
				<p class="be-comment-text">
					
					{{$comment->body}}
					
				</p>
			</div>
		</div>
		@endforeach
	@endif
</div>
	
   
	<form  action="{{route('comments.store', $post_id)}}" method="post">

		<div class="row">
                @csrf
			<div class="col-xs-12">
				<div class="form-group">
					<input type="text" name="body" class="form-input"  required  placeholder=" Enter Your comment">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input type="submit" value="Comment" class="btn btn-primary pull-right" >
				</div>
			  </div>
            
		</div>
	</form>

</div>
</div>
















<script type="text/javascript">

</script>
</body>
</html>
