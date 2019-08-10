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
use App\breederf;
use App\breederm;

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
      
     return view('/');

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
     
    public function createbreeder()
    {
        error_log('create1dog');
        return view('Dog.postbreederdog');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->breederm =1) {
            error_log('breederm');
            $data=array();
            if($request->hasfile('filename'))
            {
        
               foreach($request->file('filename') as $files)
               {
                     // Get filename with the extension
                $filenameWithExt = $files->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $files->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $files->storeAs('public/imagedog/breederm', $fileNameToStore);
    
                  
                   $data[] = $fileNameToStore;  
               }
            }
        
                
                else {
                    $fileNameToStore = 'noimage.jpg';
                }
    
        
            $imageCP = $request->file('imageCP');
                if($request->hasFile('imageCP')){
                    
                    error_log('uploaddog0');
                    // Get filename with the extension
                $filenameWithExt = $imageCP->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageCP->getClientOriginalExtension();
                // Filename to store
                $imageCPStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $imageCP->storeAs('public/imagedog/breederm/imageCP', $imageCPStore);
    
                }
    
    
                else {
                $imageCPStore = 'noimage.jpg';
                }
    
                $imageRC = $request->file('imageRC');
                    if($request->hasFile('imageRC')){
                        
                        error_log('uploaddog1');
                        // Get filename with the extension
                    $filenameWithExt = $imageRC->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $imageRC->getClientOriginalExtension();
                    // Filename to store
                    $imageRCStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $imageRC->storeAs('public/imagedog/breederm/imageCP', $imageRCStore);
    
                    }
    
    
                    else {
                    $imageRCStore = 'noimage.jpg';
                    }
    
    
            //Create
            $Dog = new breederm;
            error_log('storedog');
            $Dog->Breed = $request->Breed;
            $Dog->namedog = $request->namedog;
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
            $Dog->registrationdate = $request->Registrationdate;
            $Dog->imagedog = $fileNameToStore;
            $Dog->imageRC = $imageRCStore;
            $Dog->imageCP = $imageCPStore;
            $Dog->user_id = auth()->user()->id;
            $Dog->save();
    
            error_log('storedog1');
            
    
            return redirect('/');
        
        } 
        elseif ($request->breederf =2) {
            error_log('breederf');
            $data=array();
            if($request->hasfile('filename'))
            {
        
            foreach($request->file('filename') as $files)
            {
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

                
                $data[] = $fileNameToStore;  
            }
            }
        
                
                else {
                    $name = 'noimage.jpg';
                }

        
            $imageCP = $request->file('imageCP');
                if($request->hasFile('imageCP')){
                    
                    error_log('uploaddog0');
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
                        
                        error_log('uploaddog1');
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
            $Dog = new breederf;
            error_log('storedog');
            $Dog->Breed = $request->Breed;
            $Dog->namedog = $request->namedog;
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
            

            return redirect('/');
        }
        else {
            $data=array();
            if($request->hasfile('filename'))
            {
        
            foreach($request->file('filename') as $files)
            {
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

                
                $data[] = $fileNameToStore;  
            }
            }
        
                
                else {
                    $name = 'noimage.jpg';
                }

        
                $imageCP = $request->file('imageCP');
                if($request->hasFile('imageCP')){
                    
                    error_log('uploaddog0');
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
                        
                        error_log('uploaddog1');
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
            $Dog->namedog = $request->namedog;
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
            

            return redirect('/');
            }
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($iddog)
    {
        error_log('showdog');
        
        $Dog = Dog::find($iddog);
        //->join('users', 'dogs.user_id', '=', 'users.id') 
     
        
        return view('Dog.dog-details',compact('Dog'));
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
       return view('Dog.editdog',compact('Dog'));
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

            $Dogs = Dog::find($Iddog);
            $Dog->namedog = $request->namedog;
            $Dogs->Breed = $request->Breed;
            $Dogs->IDthedog = $request->IDthedog;
            
            $Dogs->Registrationspecies = $request->Registrationspecies;
            $Dogs->Nomicrochip = $request->Nomicrochip;
            $Dogs->color = $request->color;
            $Dogs->SEX = $request->SEX;
            $Dogs->Father = $request->Father;
            $Dogs->Momher = $request->Momher;
            $Dogs->birthday = $request->birthday;
            $Dogs->Breedername = $request->Breedername;
            $Dogs->Owner = $request->Owner;
            
            $Dogs->Registrationdate = $request->Registrationdate;
            $Dogs->imagedog = $fileNameToStore;
            $Dogs->imageRC = $imageRCStore;
            $Dogs->imageCP = $imageCPStore;
            
        
            $Dogs->save();

            error_log($Iddog);
            
            

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
        $dog = Dog::find($id);
        $dog->delete();
        return redirect('/');
    }



    public function post($iddog)
    {
        error_log($iddog);
        
        $post = Dog::findOrFail($iddog);
        
        return view('post.post',compact('post'));
        
        //return redirect('user/{id}')->with('Dogs',$post->Dogs);
    }
   public function showbreedm(Request $request)
   {
       error_log('showbredd');
        $Dog = new breederm;
        $Dog ->where('namedog','LIKE',$request);
        $Dog->get();

        return view('Dog.dogbreed-details',compact('Dog'));
   }


}
