<?php

namespace App\Http\Controllers;

use App\Dog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\post;
use App\User;
use App\orderdetail;
use App\order;
use \Auth;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = post::whereHas('orderDetail',function($query){
        //     $query->whereNull('order_id');
        // })->paginate(9);

        $post = orderdetail::rightjoin('posts', 'order_detail.id_post', '=','posts.Post_id')
            ->Join('dogs', 'posts.id_the_dog', '=', 'dogs.id')
            ->where('order_id',NULL)
            // ->leftjoin('order', 'order_detail.order_id', '=', 'order.Order_ID') 
            // ->where('order.Status')
            ->paginate(9);


        return view('category', compact('post'));
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
    public function store(Request $request, $id, $iddog)
    {

        error_log('postdog');

        $post = new post;
        $post->user_id = $id;
        $post->id_the_dog = $iddog;
        $post->Detail_Dog = $request->Detail_Dog;
        $post->type_dog = $request->type_dog;
        $post->price = $request->price;
        $post->Age_Dog = $request->Age_Dog;
        $post->eye_color = $request->eye_color;
        $post->weight_dog = $request->weight_dog;
        $post->farm_name = $request->farm_name;
        $post->tel_post = $request->tel_post;
        $post->vaccine = $request->vaccine;
        $post->save();
        error_log('postdog1');
        return redirect('/home')->with('postdog1', 'โพสขายสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($iddog,$id)
    {

        $post = post::findOrFail($id);
        $dog = Dog::findOrFail($iddog);

        return view('post.postDetail', compact('post', 'dog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        error_log('post_edit');
        $post = post::findOrFail($id);
        return view('post.editpost', compact('post'));
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
        $request->validate([

            'price' => 'required',
            'type_dog' => 'required',
            'Age_Dog' => 'required',
            'eye_color' => 'required',
            'weight_dog' => 'required',
            'farm_name' => 'required',
            'tel_post' => 'required',
            'vaccine' => 'required',
            'Detail_Dog' => 'required',
        ]);
        $post = post::find($id);
        $post->price = $request->price;
        $post->type_dog = $request->type_dog;
        $post->Age_Dog = $request->Age_Dog;
        $post->eye_color = $request->eye_color;
        $post->weight_dog = $request->weight_dog;
        $post->farm_name = $request->farm_name;
        $post->tel_post = $request->tel_post;
        $post->vaccine = $request->vaccine;
        $post->Detail_Dog = $request->Detail_Dog;
        $post->save();
        error_log("update susscc");
        return redirect('/home')->with('update susscc', 'อัปเดทขายสำเร็จ');
        
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
