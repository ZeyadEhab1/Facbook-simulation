@extends('layouts.app')
@section('title' ,'Add Friend')

@section('content')
<div class="container">
    <div class="center">
    <form class="form-inline my-2 my-lg-0" action="{{route('addfriend')}}" method="get">
        <input class="form-control mr-sm-2 "  name="username" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <div class="row">
    
       <div class="col-md-10">
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
        @foreach ($notfriends as $notfriend)

        <div class="people-nearby">
          <div class="nearby-user">
            <div class="row">
              <div class="col-md-2 col-sm-2">
                
              
                @if($notfriend->image != null)
                <img class="profile-photo-lg" src="{{asset('storage/'.$notfriend->image)}}"
                    alt="profile">
                @else
                <img class="profile-photo-lg" src="{{asset('auth/images/hamada.png')}}"
                    alt="profile">
                @endif
              </div>
              <div class="col-md-7 col-sm-7">
                <h5><a href="{{route('profile', $notfriend->id)}}" class="profile-link">{{ucwords($notfriend->fname . ' '. $notfriend->lname)}}</a></h5>
                <p>{{$notfriend->username}}</p>
                <p class="text-muted">Number of posts : {{count($notfriend->posts)}}</p>
              </div>
              <div class="col-md-3 col-sm-3">
                <a  href= "{{route("addfriend.store" , $notfriend->id)}}">  <button class="btn btn-primary pull-right">Add Friend</button> </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
  </div>
      
       
       
        
	</div>
</div>


    
@endsection