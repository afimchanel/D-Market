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
        $Dogs = Dog::where('user_id',$id)->get();
        // ->join('dogimages','dogs.ID_dog','=','dogimages.dog_id')
        // ->select()
        // ->first('image');
        
    

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
        if(auth()->user()->type === 0)
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
        
        $user = Auth::user();
        if ($request->has('profile_image')) {
        
            $IDcardnumber = $user->id.'_IDcardnumber'.time().'.'.request()->IDcardnumber->getClientOriginalExtension();
    
            $request->IDcardnumber->storeAs('idcardnumber',$IDcardnumber);
    
            $user->IDcardnumber = $IDcardnumber;
            }
        $user->name = request()->input('name');
        $user->DateofBirth = request()->input('DateofBirth');
        $user->Tel = request()->input('Tel');
        $user->address = request()->input('address');

        $user->license = request()->input('license');
        $user->Farmaddress = request()->input('Farmaddress');
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
}


