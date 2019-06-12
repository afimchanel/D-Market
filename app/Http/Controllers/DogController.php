<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use DB;
use Validator;
use Redirect;
use View;
use App\User;
class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_log('indexdog');
        $Dog = Dog::all();
        return view('user/{id}',compact('Dog',$Dog));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        error_log('createdog');
        return view('Dog.postdog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'cover_image' => 'image|nullable|max:2048',
            'cover_image1' => 'image|nullable|max:2048',
            'cover_image2' => 'image|nullable|max:2048'
        ]);
       
             // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/imagedog/cover_images', $fileNameToStore);
        }

        
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        
       




        //Create
        $Dog = new Dog;
        error_log('storedog');
        $Dog->Breed = $request->Breed;
        $Dog->IDthedog = $request->IDthedog;
        $Dog->Detail = $request->Detail;
        $Dog->Registrationspecies = $request->Registrationspecies;
        $Dog->Nomicrochip = $request->Nomicrochip;
        $Dog->color = $request->color;
        $Dog->SEX = $request->SEX;
        $Dog->Father = $request->Father;
        $Dog->Momher = $request->Momher;
        $Dog->birthday = $request->birthday;
        $Dog->Breedername = $request->Breedername;
        $Dog->Owner = $request->Owner;
        $Dog->Registrationdate = $request->Registrationdate;
        $Dog->imagedog = $fileNameToStore;
        $Dog->user_id = auth()->user()->id;
        $Dog->save();

        error_log('storedog1');
        

        return redirect('user/{id}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        error_log('edit');
        
        //$Dogs = Dog::findOrFail($id); 
       // return view('Dog.editdog', compact('Dogs')
    //);
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
