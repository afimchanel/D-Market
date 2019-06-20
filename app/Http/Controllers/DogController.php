<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use DB;
use Validator;
use Redirect;
use View;
use App\User;
use App\post;
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
        

        $files = $request->file('cover_image');
        
             // Handle File Upload
        if($request->hasFile('cover_image')){
            
                error_log('storedog0');
                 // Get filename with the extension
            $filenameWithExt = $files->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $files->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $files->storeAs('public/imagedog/cover_images', $fileNameToStore);

        }

        
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        $imageCP = $request->file('imageCP');
            if($request->hasFile('imageCP')){
                
                error_log('updatedog0');
                // Get filename with the extension
            $filenameWithExt = $imageCP->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imageCP->getClientOriginalExtension();
            // Filename to store
            $imageCPStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $imageCP->storeAs('public/imagedog/cover_images', $imageCPStore);

            }


            else {
            $imageCPStore = 'noimage.jpg';
            }

            $imageRC = $request->file('imageRC');
                if($request->hasFile('imageRC')){
                    
                    error_log('updatedog0');
                    // Get filename with the extension
                $filenameWithExt = $imageRC->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageRC->getClientOriginalExtension();
                // Filename to store
                $imageRCStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $imageRC->storeAs('public/imagedog/cover_images', $imageRCStore);

                }


                else {
                $imageRCStore = 'noimage.jpg';
                }


        //Create
        $Dog = new Dog;
        error_log('storedog');
        $Dog->Breed = $request->Breed;
        $Dog->IDthedog = $request->IDthedog;
        
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
        $Dog->imageRC = $imageRCStore;
        $Dog->imageCP = $imageCPStore;
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
    public function show($id,$iddog)
    {
        error_log('showdog');
        
        $Dog = Dog::find($iddog);
        $user = User::find($id);
        return view('Dog.dog-details',compact('Dog','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($iddog)
    {
        error_log('editdog');
        
        $Dog = Dog::find($iddog); 
       return view('Dog.editdog', compact('Dog',$Dog));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$Iddog, Dog $Dog)
    {        
        $validatedData = $request->validate([
        'Breed' => 'required',
        'IDthedog' => 'required',
        'Registrationspecies' => 'required',
        'Nomicrochip' => 'required',
        'color' => 'required',
        'SEX' => 'required',
        'Father' => 'required',
        'Momher' => 'required',
        'birthday' => 'required',
        'Breedername' => 'required',
        'Owner' => 'required',
        'Registrationdate' => 'required',

        

    ]);
    $files = $request->file('cover_image');
        
             // Handle File Upload
        if($request->hasFile('cover_image')){
            
                error_log('storedog0');
                 // Get filename with the extension
            $filenameWithExt = $files->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $files->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $files->storeAs('public/imagedog/cover_images', $fileNameToStore);

        }

        
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        $imageCP = $request->file('imageCP');
            if($request->hasFile('imageCP')){
                
                error_log('updatedog0');
                // Get filename with the extension
            $filenameWithExt = $imageCP->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imageCP->getClientOriginalExtension();
            // Filename to store
            $imageCPStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $imageCP->storeAs('public/imagedog/cover_images', $imageCPStore);

            }


            else {
            $imageCPStore = 'noimage.jpg';
            }

            $imageRC = $request->file('imageRC');
                if($request->hasFile('imageRC')){
                    
                    error_log('updatedog0');
                    // Get filename with the extension
                $filenameWithExt = $imageRC->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageRC->getClientOriginalExtension();
                // Filename to store
                $imageRCStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $imageRC->storeAs('public/imagedog/cover_images', $imageRCStore);

                }


                else {
                $imageRCStore = 'noimage.jpg';
                }
        $Dog = Dog::find($Iddog);
        $Dog->Breed = $request->Breed;
        $Dog->IDthedog = $request->IDthedog;
        
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
        $Dog->imageRC = $imageRCStore;
        $Dog->imageCP = $imageCPStore;
        
      
        $Dog->save();

    error_log($Iddog);
        
        

        return redirect('user/{id}');
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



    public function post($iddog)
    {
        error_log($iddog);
        
        $post = Dog::findOrFail($iddog);
       
       
        
        return view('post.post',compact('post',$post));

      
            
        
        
        
        //return redirect('user/{id}')->with('Dogs',$post->Dogs);
    }
    public function postdog(Request $request,$ID_dog)
    {
        error_log('postdog');
        
        //$post->id_the_Dog = $post->ID_dog;
        $post = new post;
        
        $post->title_post = $request->title_post;
        $post->id_the_dog = $ID_dog;
        $post->Detail_Dog= $request->Detail_Dog;
        $post->type_dog= $request->type_dog;
        $post->price= $request->price;
        $post->Age_Dog= $request->Age_Dog;
        $post->Farm_name= $request->Farm_name;
        $post->tel_post= $request->tel_post;
        $post->vaccine= $request->vaccine;
        
        $post->save();

        error_log('postdog1');
        

        return redirect('user/{id}',compact('post',$post));
       
    }

}
