<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function index($id)
    {
        // $post = Post::findOrFail($id);

    //return view('posts.editpost',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules =
        [
            'body'   => 'max:5000|required_without_all:image',
            'image' => 'mimes:jpeg,jpg,png,gif|required_without_all:body'
          

        ];

        $msg =
        [
            'body.max' => 'post max is 5000 char ',
            'image.mimes' => 'image type must be jpeg,jpg,png or gif ',

        ];
      
        $image=$request->file('image');
        $data=validator()->make($request->all(), $rules, $msg);
        if ($data->fails()) {
            return back()->withErrors($data->errors())->withInput();
        } else {
            $record=Post::create([
              'body'=>$request->body,
              'user_id'=>Auth::id(),
          ]);
        
            if ($image != null) {
                $record->image = $request->image->store('images/posts', 'public');
                $record->save();
            }
    
            session()->flash("success", 'Post created successfully');
            return Redirect()->back();
        }
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
        $post = Post::findOrFail($id);
        $user = User::findOrFail(Auth::id());
        return view('posts.editpost', compact('post', 'user'));
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
        'body'   => 'max:5000',
        'image' => 'mimes:jpeg,jpg,png,gif'
       

    ];

        $error_sms =
    [
        'body.max' => 'post max is 5000 char ',
        'image.mimes' => 'image type must be jpeg,jpg,png or gif ',
        'image.size' => 'Maximum image size is 512 KB',

    ];


        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }
        $post = Post::find($id);
        //upload image

        if ($request->hasFile('image')) {
            $destinationpath = 'public';
            $image=$request->file('image');
            $imageNamewithext = $image->getClientOriginalName();
            $imageName=pathinfo($imageNamewithext, PATHINFO_FILENAME);
            $extension=$image->getClientOriginalExtension();
            $imageNameToStore ='images/posts/'. $imageName .'_'.time(). "." . $extension;
            $path =$image->storeAs($destinationpath, $imageNameToStore);
            $request->image=$imageNameToStore;
        }

   
        $post->update($request->except('image'));
        if ($request->image) {
            $post->image=$request->image;
            $post->save();
        }


        session()->flash("success", 'Post updated successfully');

        return Redirect()->route('profile' ,Auth::id());
    }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $record = Post::findorfail($id);
      $record->comments()->delete();

      $record->delete();
     
    session()->flash('error', 'Post Deleted Successfully ');
      return Redirect()->back(); 

  }
  
}

