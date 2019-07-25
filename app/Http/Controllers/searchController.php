<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\post;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function show_index()
    {
        
        $q = Input::get ( 'q' );
        $user =  post::join('dogs', 'posts.id_the_dog', '=', 'dogs.ID_dog')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->where('posts.title_post','LIKE','%'.$q.'%')
        ->orWhere('posts.Detail_Dog','LIKE','%'.$q.'%')
        ->orWhere('posts.price','LIKE','%'.$q.'%')
        ->orWhere('posts.farm_name','LIKE','%'.$q.'%')
        ->orWhere('dogs.Breed','LIKE','%'.$q.'%')
        ->orWhere('users.name','LIKE','%'.$q.'%')
        
        ->get();
        if(count($user) > 0)
            return view('search.search')->withDetails($user)->withQuery ( $q );
        else 
            return view ('search.search')->withMessage('No Details found. Try to search again !');
    
    }

}
