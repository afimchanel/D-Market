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
                ->leftjoin('breed_dog', 'dogs.breed', '=', 'breed_dog.id')
                ->leftjoin('color_dog', 'dogs.color', '=', 'color_dog.id')
                ->leftjoin('sex_dog', 'dogs.sex', '=', 'sex_dog.id')
                ->leftjoin('type_dog', 'posts.type_dog', '=', 'type_dog.id')
                ->leftjoin('age_dog', 'posts.Age_Dog', '=', 'age_dog.id')
                ->leftjoin('eyecolor_dog', 'posts.eye_color', '=', 'eyecolor_dog.id')
                ->leftjoin('weight_dog', 'posts.weight_dog', '=', 'weight_dog.id')
                ->where('posts.Status',0)
                ->where('dogs.Status',0)
            ->orWhere('posts.Detail_Dog', 'LIKE', '%' . $q . '%')
            ->orWhere('posts.price', 'LIKE', '%' . $q . '%')
            ->orWhere('posts.farm_name', 'LIKE', '%' . $q . '%')
            ->orWhere('breed_dog.name_breed', 'LIKE', '%' . $q . '%')
            ->orWhere('color_dog.name_color', 'LIKE', '%' . $q . '%')
            ->orWhere('sex_dog.name_sex', 'LIKE', '%' . $q . '%')
            ->orWhere('type_dog.name_type', 'LIKE', '%' . $q . '%')
            ->orWhere('age_dog.name_age', 'LIKE', '%' . $q . '%')
            ->orWhere('eyecolor_dog.name_eyecolor', 'LIKE', '%' . $q . '%')
            ->orWhere('weight_dog.weight_dog', 'LIKE', '%' . $q . '%')
            ->orWhere('dogs.idthedog', 'LIKE', '%' . $q . '%')
            ->orWhere('users.name', 'LIKE', '%' . $q . '%')
            ->paginate(9);
        //->get();
        if (count($user) > 0)//แก้หน้าแสดงผลให้ดีขึ้น
            return view('search.search')->withDetails($user)->withQuery($q);
        else
            return view('search.search')->withMessage('No Details found. Try to search again !');
    }
    public function show_category(Request $request)
    {
        error_log($request->breed);
        error_log($request->Age_Dog);
        $post =  post::leftjoin('dogs', 'posts.id_the_dog', '=','dogs.id')
            ->orwhere('dogs.breed','=',$request->breed)
            ->orWhere('posts.Age_Dog','=',$request->Age_Dog)
            ->orWhere('posts.type_dog','=',$request->type_dog)
            ->orWhere('posts.weight_dog','=',$request->weight_dog)
            ->orWhere('posts.eye_color','=',$request->eye_color)
            ->orWhereBetween('posts.price',[$request->price_min,$request->price_max])
            ->orWhere('dogs.color','=',$request->color)
            ->orWhere('dogs.sex','=',$request->SEX)
            ->paginate(9);

        error_log($post);

        if (count($post) > 0){
            error_log('if');
            return view('search.searchcategory')->withDetails($post)->withQuery($request);
        }
        else{
            error_log('else');
            return view('search.searchcategory')->with('searchnot','ไม่พบสุนัขที่คุรตามหาอยู่')->withQuery($request);
        }            
    }

    public function search($id)
    {
        $search = DB::table('posts')
        ->leftjoin('dogs', 'posts.id_the_dog', '=', 'dogs.id')
        ->join('breed_dog', 'dogs.breed', '=', 'breed_dog.id')
        ->where('dogs.breed',$id)
        ->get();
        return view('search.searchbreed',compact('search','id'));


    }
}
