<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
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
   
          error_log('store');
          $payment = new payment([
            'price_payment' => $request->get('price_payment'),
            'Order_ID' => $request->order_id,
            'Transferdate'=> $request->get('Transferdate'),
            'tel_Customer'=> $request->get('tel_Customer'),
            'receiving_location'=> $request->get('receiving_location'),
            
            
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
          return redirect('/')->with('success', 'Stock has been added');
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
}
