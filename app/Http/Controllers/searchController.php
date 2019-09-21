<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\post;
use App\Dog;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function show_index()
    {

        $q = Input::get('q');
        $user =  post::join('dogs', 'posts.id_the_dog', '=', 'dogs.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.title_post', 'LIKE', '%' . $q . '%')
            ->orWhere('posts.Detail_Dog', 'LIKE', '%' . $q . '%')
            ->orWhere('posts.price', 'LIKE', '%' . $q . '%')
            ->orWhere('posts.farm_name', 'LIKE', '%' . $q . '%')
            ->orWhere('dogs.Breed', 'LIKE', '%' . $q . '%')
            ->orWhere('users.name', 'LIKE', '%' . $q . '%')
            ->paginate(10);
        //->get();
        if (count($user) > 0)
            return view('search.search')->withDetails($user)->withQuery($q);
        else
            return view('search.search')->withMessage('No Details found. Try to search again !');
    }
    public function show_category(Request $request)
    {

        $post =  post::join('dogs', 'posts.id_the_dog', '=', 'dogs.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('dogs.Breed', 'LIKE', '%' . $request->Breed . '%')
            ->orWhere('posts.Age_Dog', 'LIKE', '%' . $request->Age_Dog . '%')
            ->orWhere('posts.type_dog', 'LIKE', '%' . $request->type_dog . '%')
            ->orWhere('posts.weight_dog', 'LIKE', '%' . $request->weight_dog . '%')
            ->orWhere('posts.eye_color', 'LIKE', '%' . $request->eye_color . '%')
            ->orWhere('dogs.color', 'LIKE', '%' . $request->color . '%')
            ->orWhere('dogs.SEX', 'LIKE', '%' . $request->SEX . '%')
            ->paginate(10);
        //->get();
        error_log('showcategory');

        if (count($post) > 0){
            error_log('if');
            return view('search.searchcategory')->withDetails($post)->withQuery($request);
        }
        else{
            error_log('else');
            return view('search.searchcategory')->with('Message','No Details found. Try to search again !')->withDetails($post)->withQuery($request);
        }            
    }
    public function search(Request $request)
    {
        $dog = Dog::where('dogs.breed', '=',  $request->breed ) 
        
        ->orWhere('dogs.color', 'LIKE', '%' . $request. '%')
        ->orWhere('dogs.sex', 'LIKE', '%' . $request. '%')->get();
        return $dog;


    }
}
