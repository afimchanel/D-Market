<?php

namespace App\Http\Controllers;

use App\orderdetail;
use App\orders;
use App\User;
use DB;
use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_log('index_order');
       
        return view('Shoppingcart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_user,$id_dog,$id_post)
    {
        error_log('sstore');
        if (orderdetail::find($id_dog)) {
            $order = new orderdetail;
        $order->id_post = $id_post;
        $order->id_the_dog = $id_dog;
        $order->id_user = $id_user;
        //$order->Status = 1;
        $order->save();
        return redirect('');
        
        } else {
            error_log('error');
            return redirect('');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$post = post::find($id_post);
        //$dog = Dog::find($id_dog);
          
        $Order = DB::table('order_detail')
        ->where('id_user', '=', $id)
        ->join('dogs', 'order_detail.id_the_dog', '=', 'dogs.ID_dog')
        ->join('users', 'order_detail.id_user', '=', 'users.id')
        ->join('posts','order_detail.id_post','=','posts.Post_id')
        ->select('users.*', 'dogs.*', 'posts.*','order_detail.*')
        ->get();
        
        return view('Shoppingcart',compact('Order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = orders::find($id);
        $order->delete();
        return redirect()->route('post.index');
    }
    public function createorder($id)
    {

        $order = new orders;
        $order->id_user = $id;
        $order->save();
        return redirect('payment',compact('order'));
    }
    
   
}
