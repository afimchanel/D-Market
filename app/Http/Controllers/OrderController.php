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
            if (auth()->user()->email_verified_at !== NULL && (auth()->user()->IDcardnumber !== NULL )) {
                $new = orderdetail::where('id_post',$id_post)->first();

                error_log($new);
                if ( $new == null) //ทำเงื่อนไขตรงนี้ให้ดี
                {
                    error_log('if ');
                    $order = new orderdetail;
                    $order->id_post = $id_post;
                    $order->id_the_dog = $id_dog;
                    $order->id_user = $id_user;
                    $order->save();
                    
                    return redirect()->route('order.show', [$order->id_user])->with($order->id_user);
                
            } else {
                error_log('else');
                return redirect()->back();
            }
            } else {
                return view('user.EditProfileuser');
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
        ->where('order_id',Null)
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
        error_log($id);
        $Order = orderdetail::where('Order_detail',$id);
        $Order->delete();
        return view('Shoppingcart',compact('Order'));
    }

    public function destroyorder($id)
    {   
        error_log($id);

        $Order = orderdetail::where('order_id',$id);
        $Order->delete();
        $Orders=orders::where('Order_ID',$id);
        $Orders->delete();
        return redirect('/buying');
    }

    public function createorder($id)
    {
        if (Auth::check()) {
            $finde = orders::where('id_user',$id)->Orderby('updated_at','desc')->first();
            $find = orders::where('id_user',$id)->Orderby('created_at','desc')->first();
            error_log('if1');
            if ($finde == NULL){
                //เงื่อนไขที่ไม่เคยสร้างอะไรมาก่อน
                error_log('if2');
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
            } elseif($find !== NULL && $finde->Status == 0 ) {
                //ออเดอร์ช้ำ
                error_log('else1.1');
                                
                error_log('if2');
                
                $finde->id_user = $id;
                $finde->save();
                error_log($finde->Order_ID);
                $orders = orderdetail::where(['id_user'=>$id])->where('order_id',NULL)->get();
                foreach($orders as $item){
                    $item->order_id = $finde->Order_ID;
                    $item->save();
                }
                return view('payment.description')->with('success','คุณได้ยืนยันการชื้อแล้วโปรดแจ้งชำระเงิน');
                

            }
            elseif($finde !== NULL && $finde->Status == 1 ) {
                //เคยชื้อแล้วชื้ออีก
                error_log('else1.2');
                $order = new orders;
                $order->id_user = $id;
                $order->save();
                error_log($order->Order_ID);
                $orders = orderdetail::where(['id_user'=>$id])->where('order_id',NULL)->get();
                foreach($orders as $item){
                    $item->order_id = $order->Order_ID;
                    $item->save();
                }
                return view('payment.description')->with('success','โปรดชำระเงินภายใน2ช.ม');
            }
            else{
                return redirect()->back();
            }
        }else {
            error_log('else1');
        
    }
   
    }
   
}
