<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class FriendController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $user=User::findorfail(Auth::id());
   $friends= $user->friends()->whereStatus('accepted')->where(function($q) use ($request)
    {
      if($request->username){
        $q->where('username', 'LIKE', '%' . $request->username . '%');
      }
    })->paginate();
    return view('friends.friends',compact('friends'));
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function addfriend( Request $request)
  {
    $id=Auth::id();
    $users = User::find($id);
    $friends=$users->friends()->where('status','accepted' )->paginate();
    $test=$users->friends()->wherein('status',['accepted' ,'pending'])->paginate();
    $notfriends=$users->whereNotIn('id', $test->pluck('id'))->where('id' , '!=', $id)->where(function ($q) use ($request) {
      if ($request->username) {
              $q->where('username', 'LIKE', '%' . $request->username . '%');
          }
        
      })->paginate();
      $friendrequests=$users->friends()->where('status','pending')->where('sender', '0')->paginate();

    return view('friends.addfriend',compact('users','friends','notfriends','friendrequests'));
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function sendfriendRequest($id){
    $friend=User::findorfail($id);
    $user= User::findorfail(auth::id()); 
    $user->friends()->attach([$id=>['sender'=>1]]);
    $friend->friends()->attach($user->id);
    session()->flash('success', 'Friend request is sent sucesssfully');
    return redirect()->back();
  }
      
  public function acceptFriend($friend_id){

    $friend=User::findorfail($friend_id);
    $user= User::findorfail(auth::id()); 
    $user->friends()->syncWithoutDetaching([$friend_id=>[
      'status'=>'accepted'
 ]]);
 $friend->friends()->syncWithoutDetaching([$user->id=>[
  'status'=>'accepted'
]]);
    session()->flash('success', 'Friend request is Accepted sucesssfully');
    return redirect()->back();
  }


  public function rejectFriend($friend_id){
    $friend=User::findorfail($friend_id);
    $user= User::findorfail(auth::id()); 
    $user->friendS()->detach($friend_id);
    $friend->friendS()->detach($user->id);

    session()->flash('success', 'Friend request is Rejected sucesssfully');
    return redirect()->back();
}
public function unfriend($friend_id){
  $friend=User::findorfail($friend_id);
  $user= User::findorfail(auth::id()); 
  $user->friendS()->detach($friend_id);
  $friend->friendS()->detach($user->id);

  session()->flash('success', 'You Unfriend this user sucesssfully' );
  return redirect()->back();
}


 

  
}

?>