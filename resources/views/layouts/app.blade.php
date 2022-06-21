<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/edit.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/friendrequest.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/addfriend.css')}}">






</head>

<body>
    <div class="container">
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header">
                        <div class="cover">
                            <div class="gray-shade"></div>
                            <figure>
                                <img src="https://bootdey.com/img/Content/bg1.jpg" class="img-fluid"
                                    alt="profile cover">
                            </figure>
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                    @if($users->image != null)

                                    <img class="profile-pic" src="{{asset('storage/'.$users->image)}}" alt="profile">
                                    @else
                                    <img class="profile-pic" src="{{asset('auth/images/hamada.png')}}" alt="profile">
                                    @endif
                                    <span class="profile-name">{{ucwords($users->fname . ' '. $users->lname)}}</span>
                                </div>

                            </div>
                        </div>
                        @if (auth()->user()->id==$users->id)
                        <div class="header-links">
                          
                            <ul class="links d-flex align-items-center mt-3 mt-md-0">
                              
                                <li class="header-link-item d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-columns mr-1 icon-md">
                                        <path
                                            d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18">
                                        </path>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user mr-1 icon-md">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="{{route('profile' ,$users->id)}}">Profile</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-users mr-1 icon-md">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="{{route('friends.index')}}">Friends <span
                                            class="text-muted tx-12">{{$friends->count()}}</span></a>
                                </li>
                            
                   
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle " type="button"
                                        style="margin-left: 50%;" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#addpost">New Post</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#friendrequest">Friend
                                            Requests</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#editprofile">Edit
                                            Profile</a>

                                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                                    </div>
                                </ul>
                                @else 
                                <div class="header-links pull-right">
                          
                                   
                                <a  class="btn btn-primary pull-right" href="{{route('profile' ,auth()->id())}}"> Return to Profile </a>
                         
                                   
                                                            

                          

                     
                 
                @endif
                    </div>
                </div>
            </div>

            @yield('content')
            @include('friends.friendrequest')
            @include('profile.editprofilemodal')
            @include('posts.addpost')




            <script type="text/javascript">

            </script>
</body>

</html>