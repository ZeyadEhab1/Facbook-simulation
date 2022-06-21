<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Edit post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/editpost.css')}}">
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form class="form-horizontal" action="{{route('post.update',$post->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">Edit Post</h4>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Post</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="body"
                                        placeholder=" what's on your mind?"
                                        value="{{$post->body}}">{{$post->body}}</textarea>
                                    @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if($post->image != null)
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" alt="profile"
                                        width="100%">
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Post Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image">
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button style="margin: 20px;" type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-primary" href="{{route('profile',auth()->user()->id)}}">cancel</a>
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">

    </script>
</body>

</html>