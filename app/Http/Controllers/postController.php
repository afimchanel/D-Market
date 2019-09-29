<?php

namespace App\Http\Controllers;

use App\Dog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\post;
use App\User;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = DB::table('posts')
            ->Join('dogs', 'posts.id_the_dog', '=', 'dogs.id')
            ->leftjoin('order_detail', 'posts.Post_id', '=', 'order_detail.id_post')
            ->leftjoin('order', 'order_detail.order_id', '=', 'order.Order_ID')
            ->where('posts.Post_id', '>', 0)
            ->paginate(9);


        //->get();

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
        $post->title_post = $request->title_post;
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
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($iddog, $id)
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
            'title_post' => 'required',
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
        $post->title_post = $request->title_post;
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
        return $post;
        error_log("update susscc");
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
