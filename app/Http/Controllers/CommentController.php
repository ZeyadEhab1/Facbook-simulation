<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index($id)
  {
      $comments=Comment::wherePostId($id)->paginate();
      $post_id=$id;
      return view('posts.comment',compact('comments','post_id'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
//
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, $id)
  {
      $rules=[
          'body' => 'required',
      ];
      $msg=[

          'body.required'=>'comment can not be empty',
          ];

      $data=validator()->make($request->all(), $rules, $msg);
        if ($data->fails()) {
            return back()->withErrors($data->errors())->withInput();
        } else {
            $comment=Comment::create(['body'=>$request->body,
                'user_id' =>Auth::id(),
                'post_id' =>$id,
            ]);
        }
        session()->flash('success', 'Comment created Successfully ');

        return redirect()->route('comments.index',$id);

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

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Comment::findorfail($id);
    $record->delete();
   
    session()->flash('error', 'Comment Deleted Successfully ');
    return Redirect()->back(); 

  }

}

?>
