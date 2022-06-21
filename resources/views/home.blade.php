@extends('layouts.app')
@section('title' ,'Home')


@section('content')

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
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
        <ul class="timeline">
            @if (count($posts)>0)
            @foreach ($posts as $post)

            <li>
                <!-- begin timeline-time -->
                <div class="timeline-time">
                    <span class="date">{{ $post->created_at->format('Y-m-d') }}</span>
                    <span class="time">{{ $post->created_at->format('h:m') }}</span>
                </div>
                <!-- end timeline-time -->
                <!-- begin timeline-icon -->
                <div class="timeline-icon">
                    <a href="javascript:;">&nbsp;</a>
                </div>
                <!-- end timeline-icon -->
                <!-- begin timeline-body -->
                <div class="timeline-body">
                    <div class="timeline-header">

                        @if($post->user->image != null)

                        <img class="userimage" src="{{asset('storage/'.$post->user->image)}}" alt="profile">
                        @else

                        <img class="userimage" src="{{asset('auth/images/hamada.png')}}" alt="profile">
                        @endif
                        <span class="username">{{$post->user->username}}</span>
                    </div>
                    <div class="timeline-content">
                        <p>
                            {{$post->body}} </p>
                        @if ($post->image)
                        <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" alt="">

                        @endif

                        {{-- hn7ot hena if 3la sora ya hamada --}}



                    </div>
                    <div class="timeline-likes">
                        <div class="stats-right">
                            {{-- nrbbott comment page show comments number ya hamada--}}
                            <a href="{{route('comments.index',$post->id)}}"> <span class="stats-text">{{count($post->comments)}} Comments</span> </a>
                        </div>
                        <div class="stats">
                            <span class="fa-stack fa-fw stats-icon">
                                <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                            </span>
                            <span class="fa-stack fa-fw stats-icon">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                            </span>

                        </div>
                    </div>
                    <div class="timeline-footer">
                        <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i
                                class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                        <a href="{{route('comments.index',$post->id)}}" class="m-r-15 text-inverse-lighter"><i
                                class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                    </div>
                    <div class="timeline-comment-box">
                        <div>
                            @if(auth()->user()->image != null)

                            <img class="user" src="{{asset('storage/'.auth()->user()->image )}}" alt="profile">
                            @else
                            <img class="user" src="{{asset('auth/images/hamada.png')}}" alt="profile">
                            @endif
                        </div>
                        <div class="input">
                            <form action="{{route('comments.store', $post->id)}}" method="post">
                                @csrf
                                <div class="input-group" style="width: 90%">
                                    <input type="text" class="form-control rounded-corner"
                                        name="body" placeholder="Write a comment...">
                                    <span class="input-group-btn p-l-10">
                                        <button class="btn btn-primary f-s-12 rounded-corner"
                                            type="submit">Comment</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end timeline-body -->
            </li>
            @endforeach
            @else
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-header">

                        </div>

                        <div class="card-body">
                            <p class="mb-3 tx-14"> <b> You Don't Have Friends Yet</b> </p>
                            {{-- 7ot hena if 3la sora ya hamadaa--}}
                        </div>
                        <div class="card-footer">


                        </div>
                    </div>
                </div>

            </div>
            @endif




        </ul>
    </div>

    <style type="text/css">

    </style>

    <script type="text/javascript">

    </script>
</body>

</html>

@endsection