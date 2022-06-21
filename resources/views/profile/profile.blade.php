@extends('layouts.app')
@section('title' ,'Profile')

@section('content')

<div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
        <div class="card rounded">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="card-title mb-0">About</h6>

                </div>
                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Username:
                    </label>
                    <p class="text-muted">{{$users->username}}</p>
                </div>

                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
                    <p class="text-muted">{{$users->created_at->format('20y-m-d')}}</p>
                </div>

                <div class="mt-3">
                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                    <p class="text-muted">{{$users->email}}</p>
                </div>


            </div>
        </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper start -->



    <div class="col-md-8 col-xl-6 middle-wrapper">
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
        @if (count($posts)>0)
        @foreach ($posts as $post)



        <div class="row">
            <div class="col-md-12 grid-margin">

                <div class="card rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">

                                @if($users->image != null)
                                <img class="img-xs rounded-circle" src="{{asset('storage/'.$users->image)}}"
                                    alt="profile">
                                @else
                                <img class="img-xs rounded-circle" src="{{asset('auth/images/hamada.png')}}"
                                    alt="profile">
                                @endif
                                <div class="ml-2">

                                    <p class="tx-11 text-muted">
                                        <font color="black"><b>{{$users->username}}</b></font><br>
                                        {{$post->created_at->format('Y-m-d')}}<br>{{ $post->created_at->format('h:m') }}
                                    </p>
                                </div>
                            </div>
                            @if (auth()->user()->id==$users->id)
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-more-horizontal icon-lg pb-3px">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                 =
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                                            {{-- Edit post --}}
                                            <a class="dropdown-item d-flex align-items-center"
                                            href="{{route('post.edit',$post->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit-2 icon-sm mr-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg> <span class="">Edit Post</span></a>

                                                {{-- Delete post --}}
                                                <a class="dropdown-item d-flex align-items-center" href="#">


                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-activity">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg>
                                                    <form action="/post/{{$post->id}}" method="post">
                                                    @csrf 
                                                    @method('Delete')
                                                    <input type="submit" class="btn btn-link"  value="Delete Post">
                                                    </form>
                                                </a>
                                                    

                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="mb-3 tx-14">{{$post->body}}</p>
                        {{-- 7ot hena if 3la sora ya hamadaa--}}
                        @if ($post->image)
                        <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" alt="">

                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="d-flex post-actions">
                            <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-heart icon-md">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                                <p class="d-none d-md-block ml-2">Like</p>
                            </a>
                            {{-- erbot route comment ya hamadaaa --}}
                            <a href="{{route('comments.index',$post->id)}}" class="d-flex align-items-center text-muted mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-message-square icon-md">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <p class="d-none d-md-block ml-2">Comment</p>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-share icon-md">
                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                    <polyline points="16 6 12 2 8 6"></polyline>
                                    <line x1="12" y1="2" x2="12" y2="15"></line>
                                </svg>
                                <p class="d-none d-md-block ml-2">Share</p>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>


      

        @endforeach
        @else
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card rounded">
                    <div class="card-header">

                    </div>

                    <div class="card-body">
                        <p class="mb-3 tx-14"> <b>There Is No Posts Here Now </b> </p>
                        {{-- 7ot hena if 3la sora ya hamadaa--}}
                    </div>
                    <div class="card-footer">


                    </div>
                </div>
            </div>

        </div>
        @endif




    </div>

    <!-- middle wrapper end -->


    <!-- right wrapper start -->
    @if (auth()->user()->id==$users->id)
    <div class="d-none d-xl-block col-xl-3 right-wrapper">
        <div class="row">
            {{-- hnkrarhaa b loop  ya hamada--}}

            <div class="col-md-12 grid-margin">
                <div class="card rounded">
                    <div class="card-body">

                      

                        <h6 class="card-title">Suggestions For You</h6>
                        {{-- looop hena ya hamadaaa --}}
                       @if (count($suggestions))
                       @foreach ($suggestions as $suggestion)
                       <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                            <div class="d-flex align-items-center hover-pointer">
                            @if($suggestion->image != null)
                            <img class="img-xs rounded-circle" src="{{asset('storage/'.$suggestion->image)}}"
                                alt="profile">
                            @else
                            <img class="img-xs rounded-circle" src="{{asset('auth/images/hamada.png')}}"
                                alt="profile">
                            @endif
        
                            <div class="ml-2">
                                
                                <a href="{{route('profile', $suggestion->id)}}"><h6>{{$suggestion->username}}</h5></a>
                            </div>
                        </div>
                       
                        <button class="btn btn-icon"> <a href="{{route("addfriend.store" , $suggestion->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip"
                                    title="" data-original-title="Connect">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg> </a>
                        </button>
                    </div>
                        @endforeach
                       @else
                       <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                        <div class="d-flex align-items-center hover-pointer">
                        <div class="ml-2">
                            <h6> No Sugggestions Yet</h6>
                        </div>
                        </div>
                     </div>
                           
                       @endif
                         
                       

                        <a href="{{route('addfriend')}}">Show all</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
  

    @endif
    <!-- right wrapper end -->
</div>

@endsection