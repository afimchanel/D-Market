<?php

namespace App\Http\Controllers;

use App\orderdetail;
use App\orders;
use App\User;
use DB;
use Auth;
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
        
       
        error_log('เพิ่มส่วนที่ว่าต้องกรอกข้อมูลโปรไฟลให้ครบก่อนจะซ์้อด้วย');
        if (Auth::check()) {
            $new = orderdetail::where('id_post',$id_post)->first();
            error_log($new);
            if ( $new === null) //ทำเงื่อนไขตรงนี้ให้ดี
            {
                error_log('if ');
                return redirect('');
            
            } else {
                $order = new orderdetail;
                $order->id_post = $id_post;
                $order->id_the_dog = $id_dog;
                $order->id_user = $id_user;
                $order->save();
                error_log('else');
                return redirect('/')->with($order->id_user);
            }
            
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
        ->join('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
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
    public function update(Request $request)
    {
        error_log('asas');
        $order = new orders;
        $order->id_user = $request;
        $order->save();
        // เอา id_userของตารางorderdetailมาวนลูปนี้
        //$orders = orderdetail::find('id_user', '=' , $id);
        error_log($order->Order_ID);
        //$orders = orderdetail::where('id_user', '=', $id);
        $orders = new orderdetail;
        $orders = orderdetail::where('id_user', '=', $request);
        $orders->order_id =  $order->Order_ID;
        $orders->update($orders->all());
        return view('payment');
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
        // เอา id_userของตารางorderdetailมาวนลูปนี้
        //$orders = orderdetail::find('id_user', '=' , $id);
        error_log($order->Order_ID);
        $orders = orderdetail::where(['id_user'=>$id])->get();
        foreach($orders as $item){
            $item->order_id = $order->Order_ID;
            $item->save();
        }
        return view('payment.description')->with('success','คุณได้ยืนยันการชื้อแล้วโปรดแจ้งชำระเงิน');
         
    }
   
    
   
}
