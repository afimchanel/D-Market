<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\post;
use App\Dog;



class Usercontroller extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        //$this->middleware('subscribed')->except('store');

        $this->middleware(function ($request, $next) {
            // ...

            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_log('indexuser');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        error_log('createuer');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        error_log('storeuser');



    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        error_log('showuser');
        
        
        $users = User::find($id);
        $posts = DB::table('posts')
        ->where('posts.user_id', '=', $id) 
        ->join('dogs', 'posts.id_the_dog', '=', 'dogs.id')
        ->get();
        $Dogs = Dog::where('dogs.user_id',$id)

        ->paginate(8);

        
    

        return view('user.Profileuser',compact('users','posts','Dogs'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        error_log('edituser');
        if(auth()->user()->type == 0)
        {
          return view('user.EditProfileuser')->withUser($user);
        }
        else
        {
          
          return redirect()->to('/');
        }
        
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {       
        $request->validate([
            'name' => 'required',
            'DateofBirth' => 'required',
            'Tel' => 'required',
            'address' => 'required',

            'Farmaddress' => 'required',
            'IDcardnumber' => 'required',
            'license' => 'required',

        ]);
        $user = Auth::user();

            $IDcardnumber = $request->file('IDcardnumber');
                if ($request->hasFile('IDcardnumber')) {
                    
                    //echo $path;
                    error_log('upload');
                    // Get filename with the extension
                    $filenameWithExt = $IDcardnumber->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $IDcardnumber->getClientOriginalExtension();
                    // Filename to store
                    $imageIDcardnumber = $filename . '_IDcardnumber' . time() . '.' . $extension;
                    // Upload Image
                    $path = $IDcardnumber->storeAs('public/idcardnumber', $imageIDcardnumber);
                }

 
            $license = $request->file('license');
                if ($request->hasFile('license')) {

                    error_log('upload');
                    // Get filename with the extension
                    $filenameWithExt = $license->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $license->getClientOriginalExtension();
                    // Filename to store
                    $imagelicense = $filename . '_license' . time() . '.' . $extension;
                    // Upload Image
                    $path = $license->storeAs('public/license', $imagelicense);
                } 


        $user->name = request()->input('name');
        $user->DateofBirth = request()->input('DateofBirth');
        $user->Tel = request()->input('Tel');
        $user->address = request()->input('address');
        $user->IDcardnumber = $imageIDcardnumber;
        $user->license = $imagelicense;
        $user->Farmaddress = request()->input('Farmaddress');
        $user->accountnumber = request()->input('accountnumber');
        error_log('updateuser');
        $user->save();
        

        return redirect('/');
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

    public function update_avatar(Request $request){
        error_log('updateuseravater');
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return redirect('user/{id}');

    }
//     public function poi(){
//         $orderid = orders::where('id_user',Auth::user()->id)
//         ->where('Status',1)
//         ->Orderby('updated_at','desc')->first();
//         if ($orderid = NULL) {
//         return $order = NULL;
//         } else {
//         $order = orderdetail::where('order_detail.id_user',Auth::user()->id)
//         ->LEFTjoin('dogs', 'order_detail.id_the_dog', '=', 'dogs.id')
//         ->LEFTjoin('posts', 'order_detail.id_post', '=', 'posts.Post_id')
//         ->LEFTjoin('order', 'order_detail.order_id', '=', 'order.Order_ID')
//         ->LEFTjoin('payment', 'order.Order_ID', '=', 'payment.Order_ID')
//         ->where('order_detail.order_id',$orderid->Order_ID)
//         ->get();
//         }
//     }
 }


