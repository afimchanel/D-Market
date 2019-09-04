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
use App\dogimages;

use App\dogvideo;
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

        if ($request->has('check')) {
            error_log('breederm');
            $imageCP = $request->file('imageCP');
            if ($request->hasFile('imageCP')) {

                error_log('uploaddog0');
                // Get filename with the extension
                $filenameWithExt = $imageCP->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageCP->getClientOriginalExtension();
                // Filename to store
                $imageCPStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $imageCP->storeAs('public/imagedog/breederm/imageCP', $imageCPStore);
            } else {
                $imageCPStore = 'noimage.jpg';
            }



            $imageRC = $request->file('imageRC');
            if ($request->hasFile('imageRC')) {

                error_log('uploaddog1');
                // Get filename with the extension
                $filenameWithExt = $imageRC->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageRC->getClientOriginalExtension();
                // Filename to store
                $imageRCStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $imageRC->storeAs('public/imagedog/breederm/imageCP', $imageRCStore);
            } else {
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
            
            $Dog->imageRC = $imageRCStore;
            $Dog->imageCP = $imageCPStore;
            $Dog->user_id = auth()->user()->id;
            $Dog->save();

            error_log('Add father dog through the process, add information, going to add pictures');

            $data = array();
            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $files) {
                    // Get filename with the extension
                    $filenameWithExt = $files->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $files->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    // Upload Image
                    $path = $files->storeAs('public/imagebigdog', $fileNameToStore);
                    $data[] = $fileNameToStore;
                    $dogimages = new dogimages;
                    $dogimages->dog_id = $request->IDthedog;
                    $dogimages->image = $fileNameToStore;
                    $dogimages->save();
                }
            }
            error_log('Add Father to Dog Success');
            $data1 = array();

            return redirect('/');
        }  else {
            
            $imageCP = $request->file('image');
            if ($request->hasFile('image')) {

                error_log('uploaddog0');
                // Get filename with the extension
                $filenameWithExt = $imageCP->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageCP->getClientOriginalExtension();
                // Filename to store
                $imagecover = $filename . '_image' . time() . '.' . $extension;
                // Upload Image
                $path = $imageCP->storeAs('public/imagecover', $imagecover);
            } else {
                $imagecover = 'nopicture.jpg';
            }
            
            $imageCP = $request->file('imageCP');
            if ($request->hasFile('imageCP')) {

                error_log('uploaddog0');
                // Get filename with the extension
                $filenameWithExt = $imageCP->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageCP->getClientOriginalExtension();
                // Filename to store
                $imageCPStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $imageCP->storeAs('public/imagedog/imageCP', $imageCPStore);
            } else {
                $imageCPStore = 'noimage.jpg';
            }

            $imageRC = $request->file('imageRC');
            if ($request->hasFile('imageRC')) {

                error_log('uploaddog1');
                // Get filename with the extension
                $filenameWithExt = $imageRC->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $imageRC->getClientOriginalExtension();
                // Filename to store
                $imageRCStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $imageRC->storeAs('public/imagedog/imageRC', $imageRCStore);
            } else {
                $imageRCStore = 'noimage.jpg';
            }
            
            $Dog = new Dog;
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
            $Dog->image = $imagecover;
            $Dog->imageRC = $imageRCStore;
            $Dog->imageCP = $imageCPStore;
            $Dog->user_id = auth()->user()->id;
            $Dog->save();
            error_log('Add a dog through the steps to add information.');
            
            //Createimages
            
            $data = array();
            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $files) {
                    // Get filename with the extension
                    $filenameWithExt = $files->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $files->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    // Upload Image
                    $path = $files->storeAs('public/imagedog', $fileNameToStore);
                    $data[] = $fileNameToStore;
                    $dogimages = new dogimages;
                    $dogimages->dog_id = $Dog->ID_dog;
                    $dogimages->image = $fileNameToStore;
                    $dogimages->save();
                }
            }
            if ($request->hasfile('video')) {

                foreach ($request->file('video') as $files) {
                    // Get filename with the extension
                    $filenameWithExt = $files->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $files->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    // Upload Image
                    $path = $files->storeAs('public/videodog', $fileNameToStore);
                    $data1[] = $fileNameToStore;
                    $dogvideo = new dogvideo;
                    $dogvideo->dog_id = $Dog->ID_dog;
                    $dogvideo->video = $fileNameToStore;
                    $dogvideo->save();
                }
            }
            error_log('Add Father to Dog Success');
            error_log('Successfully added dog');


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
        
        // ->join('dogimages','dogs.ID_dog', '=','dogimages.dog_id')
        // ->get();
       
        // ->join('dogimages','dogs.ID_dog', '=','dogimages.dog_id')
        // ->where('dogs.ID_dog', '=', $iddog);
        
        return view('Dog.dog-details', compact('Dog','iddog'));
    }

    public function showbreed($iddog)
    {
        error_log('showbreed');

        $Dog = breederm::find($iddog);
    
        return view('Dog.dog-details', compact('Dog','iddog'));
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
        return view('Dog.editdog', compact('Dog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Iddog, Dog $Dog) //มีให้แก้
    {
        $request->validate([
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
        
        $imageCP = $request->file('imageCP');
        if ($request->hasFile('imageCP')) {

            error_log('updatedog0');
            // Get filename with the extension
            $filenameWithExt = $imageCP->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imageCP->getClientOriginalExtension();
            // Filename to store
            $imageCPStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $imageCP->storeAs('public/imagedog/cover_images', $imageCPStore);
            $Dogs->imageCP = $imageCPStore;
        }




        $imageRC = $request->file('imageRC');
        if ($request->hasFile('imageRC')) {

            error_log('updatedog0');
            // Get filename with the extension
            $filenameWithExt = $imageRC->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $imageRC->getClientOriginalExtension();
            // Filename to store
            $imageRCStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $imageRC->storeAs('public/imagedog/cover_images', $imageRCStore);
            $Dogs->imageRC = $imageRCStore;
        }
        
        $Dogs->save();

        // ทำไม if else ถ้ามีข้อมูลด้านในยุแล้วถ้าไม่มีเปนยังไง
        // $data = array();
        // if ($request->hasfile('filename')) {
        //     $dogimages = dogimages::where('dog_id',$Iddog);
        //     foreach ($request->file('filename') as $files) {
        //         // Get filename with the extension
        //         $filenameWithExt = $files->getClientOriginalName();
        //         // Get just filename
        //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //         // Get just ext
        //         $extension = $files->getClientOriginalExtension();
        //         // Filename to store
        //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //         // Upload Image
        //         $path = $files->storeAs('public/imagedog/image_dog', $fileNameToStore);
        //         $data[] = $fileNameToStore;
                
        //         $dogimages->dog_id = $Dog->ID_dog;
        //         $dogimages->image = $fileNameToStore;
        //         $dogimages->save();
        //     }
        // }
        
        
        error_log("update susscc");



        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  error_log("asd1");
        $dog = Dog::findOrFail($id);
        error_log("delete");
        if ($dog != null) {
            $dog->delete();
            return redirect('/')->with(['message'=> 'Successfully deleted!!']);
        }
        return view('user.Profileuser');
    }



    public function post($iddog, $id)
    {
        error_log($iddog);
        $user =  User::find($id);
        if ($user->license === 'noimage.jpg' || $user->Farmaddress === NULL) {
            return view('user.EditProfileuser')->with('success','กรุณาเพิ่มที่อยู่ฟาร์มหรือใบอนุญาตจำกสมาคม');
        } else {

            $post = Dog::findOrFail($iddog);

            return view('post.post', compact('post'));
        }


        //return redirect('user/{id}')->with('Dogs',$post->Dogs);
    }
    public function showbreedm($Father)
    {
        error_log($Father);

        $Dog = breederm::where('namedog',$Father)->first();
        return view('Dog.dogbreed-details',compact('Dog'));
       
    }
}
