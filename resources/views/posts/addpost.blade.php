<div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form class="form-horizontal" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
              <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">New Post</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Post</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder=" what's on your mind?" name="body" rows="5"></textarea>
                        @if ($errors->has('body'))
                          <span class="help-block">
                              <strong>{{ $errors->first('body') }}</strong>
                          </span>
                      @endif
                      </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" >Post Image</label>
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
                        <div class="col-sm-10 col-sm-offset-2">
                          <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                      </div>
               
            </form>
        </div>
    </div>
</div>