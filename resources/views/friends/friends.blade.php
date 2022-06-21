<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Friends</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('css/friends.css')}}">

</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<div class="container">

    <div class="content contact-list">
        <div class="card card-default">
            <div class="card-header align-items-center px-3 px-md-5">
                <h2>Friends</h2>
                <form class="form-inline my-2 my-lg-0" action="{{route('friends.index')}}" method="get">
                    @csrf
                    <input class="form-control mr-sm-2 " name="username" type="search" placeholder="Search by username" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                  </form>
               <a  class="btn btn-primary" href="{{route('profile' ,auth()->id())}}"> Return to Profile </a>
            </div>

            <div class="card-body px-3 px-md-5">
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
                <div class="row">

                    @if (count($friends))
                    @foreach ($friends as $friend)
                    <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                        <div class="card card-default p-4">
                        <a href="{{route('profile',$friend->id)}}" class="media text-secondary" >
                            @if($friend->image != null)

                            <img class="mr-3 img-fluid rounded" src="{{asset('storage/'.$friend->image)}}" alt="profile">
                            @else
                            <img class="mr-3 img-fluid rounded" src="{{asset('auth/images/hamada.png')}}" alt="profile">
                            @endif
                        </a>
                            <div class="media-body" class="media text-secondary">
                                <h5 class="mt-0 mb-2 text-dark">{{ucwords($friend->fname . ' '. $friend->lname)}}</h5>
                                <p> {{$friend->username}}</p>
                                <p> Number of posts={{count($friend->posts)}}</p>
                                <a href="{{route('unfriend', $friend->id)}}">   <button class="btn btn-primary" > Unfriend </button></a>


                              
                            </div>
                        
                    </div>
                </div>
                    @endforeach
                    @else
                    <div class="col-lg-6 col-xl-4 col-md-6 col-sm-12">
                        <div class="card card-default p-4">
                            <h4>You Don't Have friends Yet</h4>
                        </a>
                    </div>
                </div>
                        
                    @endif
                      
                </div>
            </div>
                   
                    

                   


                   
                </div>
            </div>
        </div>

    </div>
</div>



<script type="text/javascript">

</script>
</body>
</html>