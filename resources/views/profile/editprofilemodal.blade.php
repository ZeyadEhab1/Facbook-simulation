<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <form class="form-horizontal" action="{{route('profile.update',$users->id)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Profile info</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" name="fname" placeholder="fnmae .."
                                    value="{{$users->fname}}">
                                @if ($errors->has('fname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" name="lname" placeholder="lnmae .."
                                    value="{{$users->lname}}">
                                @if ($errors->has('lname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" placeholder="username .."
                                    value="{{$users->username}}">
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="email .."
                                    value="{{$users->email}}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @if($users->image != null)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Profile Picture</label>
                            <div class="col-sm-10">
                                <img class="profile-pic" src="{{asset('storage/'.$users->image)}}" alt="profile"
                                    width="200">
                            </div>
                        </div>

                        @endif
                        <div class="form-group">
                            <label class="col-sm-2 control-label">New Profile Picture</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="images" name="image">
                                @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Current password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="oldpassword">
                                @if ($errors->has('oldpassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('oldpassword') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">New password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password confirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>