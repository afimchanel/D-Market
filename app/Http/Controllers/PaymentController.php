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
        $request->validate([
            'price_payment'=>'required',
            'Transferdate'=> 'required',
            'tel_Customer' => 'required',
            'receiving_location' => 'required',
            'image_payment' => 'required',
            'image_payment_IDcardnumber' => 'required',
          ]); 
          $payment = new payment([
            'price_payment' => $request->get('price_payment'),
            'Order_ID' => $request->get('Order_ID'),
            'Transferdate'=> $request->get('Transferdate'),
            'tel_Customer'=> $request->get('tel_Customer'),
            'receiving_location'=> $request->get('receiving_location'),
            'image_payment'=> $request->get('image_payment'),
            'image_payment_IDcardnumber'=> $request->get('image_payment_IDcardnumber'),
          ]);
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
