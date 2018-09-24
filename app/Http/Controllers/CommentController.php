<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = Post::with('user')->find($request->get('post_id'));
/*        $this->validate(request(), [
        'comment'=> 'required|min:5'
            ]);*/

        if (policy(Comment::Class)->create(auth()->user(),$post)) {
            $comment= new Comment();
            $comment->post_id=$request->get('post_id');
            $comment->user_id=auth()->user()->id;
            $comment->comment=$request->get('comment');
            $comment->save();
            return redirect('post/'.$comment->post_id);
        }
        else
           return redirect('not_found'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        if (auth()->user()->can('delete', $comment)) {
            $comment->delete();
            return redirect('post/'.$comment->post_id)->with('success', 'Post has been deleted');
        }
        else
            return redirect('not_found'); 
    }
}
