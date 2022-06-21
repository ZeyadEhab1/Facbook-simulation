<div class="modal fade" id="friendrequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="header">
                <h3 class="text-muted prj-name">
                    
                   <pre>   Friend Requests </pre>
                </h3>
              </div>
            
            
                 
            
                <ul class="list-group">
                  @if (count($friendrequests)>0)
                  @foreach ($friendrequests as $friendrequest)

                 
                  <li  class="list-group-item text-left">
                    @if($friendrequest->image != null)
                    <img class="img-thumbnail" src="{{asset('storage/'.$friendrequest->image)}}" alt="profile">
                    @else
                    <img class="img-thumbnail" src="{{asset('auth/images/hamada.png')}}" alt="profile">
                    @endif
                      <label class="name">
                     <a href="{{route('profile',$friendrequest->id)}}"> <h4> {{ucwords($friendrequest->fname . ' '. $friendrequest->lname)}} </h4></a>
                      <p> Username : {{$friendrequest->username}}</p> 
                      <p> Sent From : {{$friendrequest->created_at->format('y-m-d h:m')}}</p>
                      </label>
                    <label class="pull-right">
                        <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="{{route('friendrequest.accept' ,$friendrequest->id)}}" title="Accept"></a>
                        <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="{{route('friendrequest.reject' ,$friendrequest->id)}}" title="Delete"></a>
                    </label>
                    <div class="break"></div>
                  </li>
             @endforeach
            
                 
             @else
             <li  class="list-group-item text-left">
              
                <label class="name">
              <p>No Friend Requests Yet</p>
                </label>

              <div class="break"></div>
            </li>
           
            @endif
                


                </ul>
              </div>
              </div>
            </div>                                                                                
        </div>
    </div>
