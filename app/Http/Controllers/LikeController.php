<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
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
        $is_like = Like::where(["user_id"=>auth()->user()->id,"post_id"=>$request->get('post_id')]);
        if($is_like->count()==0){
            $like= new Like();
            $like->post_id=$request->get('post_id');
            $like->user_id=auth()->user()->id;
            $like->save();
        }
        $count = Like::where('post_id', $request->get('post_id'))->count();
        return response()->json(['count' => $count,'id' => $like->id]); 
        //return redirect('post/'.$request->get('post_id'));
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
    public function destroy(Request $request, $id)
    {
        //
        $like = Like::where(["user_id"=>auth()->user()->id,"post_id"=>$request->get('post_id')]);
        $like->delete();
        //return redirect('post/'.$request->get('post_id'));
        $count = Like::where('post_id', $request->get('post_id'))->count();
        return response()->json(['count' => $count]); 
    }
}
