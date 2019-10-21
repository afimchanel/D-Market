<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\orders;
use App\orderdetail;
use App\post;
use App\Dog;
use App\User;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment');
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
        $request->validate([
            'order_id'=>'required',      
          ]);
          error_log('store');
          if ($request->total == $request->price_payment) {
            $payment = new payment([
                'price_payment' => $request->get('price_payment'),
                'Order_ID' => $request->get('order_id'),
                'Transferdate'=> $request->get('Transferdate'),
                'tel_Customer'=> $request->get('tel_Customer'),
                'price_check'=> $request->get('total'),
                'receiving_location'=> $request->get('receiving_location'),
                'pickyourown'=> $request->get('pickyourown'),
                'address'=> $request->get('address'),


              ]);
                      
                $image_payment = $request->file('image_payment');
                if ($request->hasFile('image_payment')) {
    
                    error_log('image_payment');
                    // Get filename with the extension
                    $filenameWithExt = $image_payment->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $image_payment->getClientOriginalExtension();
                    // Filename to store
                    $image_paymentStore = $filename . '_' . time() . '.' . $extension;
                    // Upload Image
                    $path = $image_payment->storeAs('public/image_payment', $image_paymentStore);
                    
                }
                $image_payment_IDcardnumber= $request->file('image_payment_IDcardnumber');
                if ($request->hasFile('image_payment_IDcardnumber')) {
    
                    error_log('image_payment_IDcardnumber');
                    // Get filename with the extension
                    $filenameWithExt = $image_payment->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $image_payment_IDcardnumber->getClientOriginalExtension();
                    // Filename to store
                    $image_payment_IDcardnumberStore = $filename . '_' . time() . '.' . $extension;
                    // Upload Image
                    $path = $image_payment_IDcardnumber->storeAs('public/image_payment_IDcardnumber', $image_payment_IDcardnumberStore);
                    
                }
                $payment->image_payment_IDcardnumber = $image_payment_IDcardnumberStore;
                $payment->image_payment = $image_paymentStore;
              $payment->save();
              return redirect('/buying')->with('success', 'เพิ่มใบเปย์เม้นสำเร็จ');
          }
          return redirect()->back()->with('mm','คุณกรอกเงินไม่ตรงกับราคาที่กำหนดไว้');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('payment');
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
    public function success($id)
    {
        //ยืนยันการโอนแล้ว
        error_log($id);
        //ให้idวนกับออเดอดีเทว
        $orderdetail = orderdetail::join('posts', 'order_detail.id_post', '=','posts.Post_id')->where('order_detail.order_id',$id)->first();
        error_log($orderdetail);
        $post = post::where('Post_id',$orderdetail->Post_id)->first();
          
            $post->Status = 1;
            $post->save();
        $order = orders::where('Order_ID',$id)->Orderby('updated_at','desc')->first();
        $order->Status = 1;
        $order->save();
        return redirect()->back();
        
    }

    
    public function geted($id,$id_post)
    {
        //wได้รับของแล้ว

        $post = post::where('Post_id',$id_post)->first(); 
        $dog= Dog::where('id',$post->id_the_dog)->first();
        $dog->Status = 3;
        $dog->save();
        $post->Status = 2;
        $post->save();
        
        error_log($id);
        $order = orders::where('Order_ID',$id)->Orderby('updated_at','desc')->first();
        $order->Status = 2;
        $order->save();
        $score1 = User::find($post->user_id);
        $score1->score = $score1->score + 1;
        $score1->save();
        $score=auth()->user();
        $score->score = $score->score + 1;
        $score->save();
        return redirect()->back();
        
    }

    public function finish(Request $request,$id,$id_post)
    {   //ส่งของแล้ว
        $request->validate([
            'deliveryreceipt' => 'required',
            'description' => 'required',
            
        ]);

        $post = post::where('Post_id',$id_post)->first(); 
        $post->Status = 3;
        $post->save();
            
        error_log($id);
        $order = orders::where('Order_ID',$id)->Orderby('updated_at','desc')->first();

        $imagedeliveryreceipt1 = $request->file('deliveryreceipt');
        if ($request->hasFile('deliveryreceipt')){

            error_log('uploaddog0');
            // Get filename with the extension
            $filenameWithExt = $imagedeliveryreceipt1->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imagedeliveryreceipt1->getClientOriginalExtension();
            // Filename to store
            $imagedeliveryreceipt = $filename . '_imagedeliveryreceipt' . time() . '.' . $extension;
            // Upload Image
            $path = $imagedeliveryreceipt1->storeAs('public/imagedeliveryreceipt', $imagedeliveryreceipt);
        }
        
        $order->description = $request->description;
        $order->deliveryreceipt = $imagedeliveryreceipt;
        $order->Status = 3;
        $order->save();
        return redirect()->back();
        
    }

    public function finished(Request $request,$id,$id_post)
    {   //โอนเงินแล้ว
        $request->validate([
            'proofoftransfer' => 'required',
        ]);
        $post = post::where('Post_id',$id_post)->first(); 
        $post->Status = 3;
        $post->save();
            
        error_log($id);
        $order = orders::where('Order_ID',$id)->Orderby('updated_at','desc')->first();

        $imageproofoftransfer1 = $request->file('proofoftransfer');
        if ($request->hasFile('proofoftransfer')){

            error_log('uploaddog0');
            // Get filename with the extension
            $filenameWithExt = $imageproofoftransfer1->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imageproofoftransfer1->getClientOriginalExtension();
            // Filename to store
            $imageproofoftransfer = $filename . '_imageproofoftransfer' . time() . '.' . $extension;
            // Upload Image
            $path = $imageproofoftransfer1->storeAs('public/imageproofoftransfer', $imageproofoftransfer);
        }

        $order->proofoftransfer = $imageproofoftransfer;
        $order->Status = 4;
        $order->save();
        return redirect()->back();
        
    }

}
