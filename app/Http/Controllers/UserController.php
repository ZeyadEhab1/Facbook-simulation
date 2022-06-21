<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Dotenv\Result\Success;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function index($id)
    {
        
        $users = User::find($id);
        $posts= $users->posts()->orderby('updated_at', 'desc')->paginate();
        $friends=$users->friends()->where('status','accepted')->paginate();
        //get users friends (pending or accepted)
        $test=$users->friends()->wherein('status',['accepted' ,'pending'])->paginate();
        $suggestions=$users->whereNotIn('id', $test->pluck('id'))->where('id' , '!=', $id)->inRandomOrder()->paginate(3);
        $friendrequests=$users->friends()->where('status','pending')->where('sender', '0')->paginate();
      

        return  view('profile.profile', compact('users', 'posts', 'friends' ,'suggestions' ,'friendrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users = User::find(1);


        // return view('profile.editprofilemodal',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules =
            [
                'fname'   => 'required | min:3',
                'lname'   => 'required | min:3',
                'username'=> 'required | min:3 |unique:users,username,'.\Auth::id().'',
                'email'   => 'required | email |unique:users,email,'.\Auth::id().'',  //'unique:users,email,'Auth::id()';
                'password'=> 'nullable|min:5|confirmed',
                'oldpassword'=> 'required',
                 'image' => 'mimes:jpeg,jpg,png'



            ];

        $error_sms =
            [
                'fname.required' => 'Please, enter your First name ',
                'fname.min' => 'First Name must be more than 3 characters  ',
                'lname.required' => 'Plaese, enter your last name ',
                'lname.min' => 'Last Name must be more than 3 characters ',
                'email.email'    => 'Email is not valid',
                'email.unique'    => 'Email is already taken',
                'email.required'    => 'Please, enter your email',
                'username.required' => 'Please, enter your username ',
                'username.min' => 'Username must be more than 3 characters ',
                'password.confirmed' => 'wrong password confirmation ',


            ];
            
        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }
        $id=Auth::id();

        $user = User::find($id);
        //upload image

        if ($request->hasFile('image')) {
            $destinationpath = 'public';
            $image=$request->file('image');
            $imageNamewithext = $image->getClientOriginalName();
            $imageName=pathinfo($imageNamewithext, PATHINFO_FILENAME);
            $extension=$image->getClientOriginalExtension();
            $imageNameToStore ='images/users/'. $imageName .'_'.time(). "." . $extension;
            $path =$image->storeAs($destinationpath, $imageNameToStore);
            $request->image=$imageNameToStore;
        }

      
        //pasword
        $hashedPassword =$user->password;
        if (\Hash::check($request->oldpassword, $hashedPassword)) {
            if (! $request->password) {
                $user->update($request->except('password'));
                if ($request->image) {
                    $user->image=$request->image;
                    $user->save();
                }
                session()->flash("success", 'profile info updated successfully');
                return redirect()->route('profile' ,$id);
            } else {
                if (!\Hash::check($request->password, $hashedPassword)) {
                    $newpassword = bcrypt($request->password);
                    $request->merge(["password" =>  $newpassword]);
                    $user->update($request->all());
                    if ($request->image) {
                        $user->image=$request->image;
                        $user->save();
                    }
                    
                    return redirect()->route('logout');
                } else {
                    session()->flash('error', "new password can not be the old password!");
                    return redirect()->route('profile' ,$id);
                }
            }
        } else {
            session()->flash('error', 'old password doesnt matched ');
            return redirect()->route('profile' ,$id);
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }
}