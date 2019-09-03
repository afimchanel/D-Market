<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\post;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    
    public function index()
    {
        if(auth()->user()->isAdmin()) {
            return view('admin/dashboard');
        } else {
            $user = User::where('id', '>', 0)
            ->paginate(15);
            $post = DB::table('posts')
            ->join('dogs', 'posts.id_the_dog', '=', 'dogs.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            
            
            ->paginate(7);
            return view('/home', compact('post','user'));
        }
    }

    public function Product()
    {
//
        
    }
}
