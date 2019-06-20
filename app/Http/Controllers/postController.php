<?php

namespace App\Http\Controllers;
use App\Dog;
use Illuminate\Http\Request;
use App\post;

class postController extends Controller
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
    public function store(Request $request,$id,$iddog)
    {
        
        error_log('postdog');

        $post = new post;
        
        $post->title_post = $request->title_post;
        $post->user_id = $id;
        $post->id_the_dog = $iddog;
        $post->Detail_Dog= $request->Detail_Dog;
        $post->type_dog= $request->type_dog;
        $post->price= $request->price;
        $post->Age_Dog= $request->Age_Dog;
        $post->Farm_name= $request->Farm_name;
        $post->tel_post= $request->tel_post;
        $post->vaccine= $request->vaccine;
        
        $post->save();

        error_log('postdog1');
        

        return redirect('user/{id}',compact('post',$post));
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
    }
}
