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
use App\auth;
use App\dogimages;
use Illuminate\Support\Facades\Session;
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
        if (auth()->user()->accountnumber != NULL && (auth()->user()->IDcardnumber != NULL )) {
            return view('Dog.postdog');
        } else {
            return view('user.EditProfileuser')->with('vd', 'กรุณาอัปรูปบัตรประชาชน');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namedog'=>'required',
            'Breed'=> 'required',
            'IDthedog'=> 'required',
            'namedog'=> 'required',
            'Registrationspecies'=> 'required',
            'Nomicrochip'=> 'required',
            'color'=> 'required',
            'SEX'=> 'required',
            'Momher'=> 'required',
            'birthday'=> 'required',
            'Breedername'=> 'required',
            'Owner'=> 'required',
            'Registrationdate'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:2048',

          ]);
                $imagecover = $request->file('image');
                if ($request->hasFile('image')) {

                    error_log('uploaddog0');
                    // Get filename with the extension
                    $filenameWithExt = $imagecover->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $imagecover->getClientOriginalExtension();
                    // Filename to store
                    $imagecoverStore = $filename . '_image' . time() . '.' . $extension;
                    // Upload Image
                    $path = $imagecover->storeAs('public/imagecover', $imagecoverStore);
                } else {
                    $imagecoverStore = 'nopicture.jpg';
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

                // $imageRC = $request->file('imageRC');
                // if ($request->hasFile('imageRC')) {

                //     error_log('uploaddog1');
                //     // Get filename with the extension
                //     $filenameWithExt = $imageRC->getClientOriginalName();
                //     // Get just filename
                //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //     // Get just ext
                //     $extension = $imageRC->getClientOriginalExtension();
                //     // Filename to store
                //     $imageRCStore = $filename . '_' . time() . '.' . $extension;
                //     // Upload Image
                //     $path = $imageRC->storeAs('public/imagedog/imageRC', $imageRCStore);
                // } else {
                //     $imageRCStore = 'noimage.jpg';
                // }
                
                $Dog = new Dog;
                $Dog->Breed = $request->Breed;
                $Dog->namedog = $request->namedog;
                $Dog->IDthedog = $request->IDthedog;
                $Dog->Registrationspecies = $request->Registrationspecies;
                $Dog->Nomicrochip = $request->Nomicrochip;
                $Dog->color = $request->color;
                $Dog->sex = $request->SEX;
                $Dog->Father = $request->Father;
                $Dog->id_father = $request->id_father;
                $Dog->Momher = $request->Momher;
                $Dog->id_momher = $request->id_momher;
                $Dog->birthday = $request->birthday;
                $Dog->Breedername = $request->Breedername;
                $Dog->Owner = $request->Owner;
                $Dog->Registrationdate = $request->Registrationdate;   
                $Dog->image = $imagecoverStore;
                // $Dog->imageRC = $imageRCStore;
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
                        $dogimages->dog_id = $Dog->IDthedog;
                        $dogimages->user_id = auth()->user()->id;
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
                        $dogvideo->dog_id = $Dog->IDthedog;
                        $dogvideo->user_id = auth()->user()->id;
                        $dogvideo->video = $fileNameToStore;
                        $dogvideo->save();
                    }
                }
                error_log('Add Father to Dog Success');
                error_log('Successfully added dog');


                return redirect('/home')->with('success', 'เพิ่มสุนัขได้สำเร็จ');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        error_log('showdog');
        if ($id <= 0) {
            return redirect()->back();
        }else{
            $Dogs = DB::table('dogs')->where('idthedog','=',$id)->where('user_id',auth()->user()->id)->get();
            $gene = DB::table('dogs')->where('idthedog','=',$id)->get();
            error_log($Dogs);
            return view('Dog.dog-details',compact('Dogs','id','gene'));
        }
       
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
    public function update(Request $request,$Iddog) 
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
        $imagecover = $request->file('cover_image');
                if ($request->hasFile('cover_image')) {

                    error_log('uploaddog0');
                    // Get filename with the extension
                    $filenameWithExt = $imagecover->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $imagecover->getClientOriginalExtension();
                    // Filename to store
                    $imagecoverStore = $filename . '_image' . time() . '.' . $extension;
                    // Upload Image
                    $path = $imagecover->storeAs('public/imagecover', $imagecoverStore);
                } else {
                    $imagecoverStore = 'nopicture.jpg';
                }
                
        $Dogs = Dog::find($Iddog);
        $Dogs->namedog = $request->namedog;
        $Dogs->Breed = $request->Breed;
        $Dogs->IDthedog = $request->IDthedog;
        $Dogs->Registrationspecies = $request->Registrationspecies;
        $Dogs->Nomicrochip = $request->Nomicrochip;
        $Dogs->color = $request->color;
        $Dogs->sex = $request->SEX;
        $Dogs->Father = $request->Father;
        $Dogs->id_father = $request->id_father;
        $Dogs->Momher = $request->Momher;
        $Dogs->id_momher = $request->id_momher;
        $Dogs->birthday = $request->birthday;
        $Dogs->Breedername = $request->Breedername;
        $Dogs->Owner = $request->Owner;
        $Dogs->image = $imagecoverStore;
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
            $path = $imageCP->storeAs('public/imagedog/imageCP', $imageCPStore);
            $Dogs->imageCP = $imageCPStore;
        }

        // $imageRC = $request->file('imageRC');
        // if ($request->hasFile('imageRC')) {

        //     error_log('updatedog0');
        //     // Get filename with the extension
        //     $filenameWithExt = $imageRC->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $imageRC->getClientOriginalExtension();
        //     // Filename to store
        //     $imageRCStore = $filename . '_' . time() . '.' . $extension;
        //     // Upload Image
        //     $path = $imageRC->storeAs('public/imagedog/imageRC', $imageRCStore);
        //     $Dogs->imageRC = $imageRCStore;
        // }
        
        $Dogs->save();

        $data = array();
        if ($request->hasfile('filename')) {
            $dogimages = dogimages::where('dog_id',$Iddog);
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
                $path = $files->storeAs('public/imagedog/image_dog', $fileNameToStore);
                $data[] = $fileNameToStore;
                
                $dogimages->dog_id = $Dogs->IDthedog;
                $dogimages->image = $fileNameToStore;
                $dogimages->save();
            }
        
        }if ($request->hasfile('video')) {

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
                $dogvideo->dog_id = $Dogs->IDthedog;
                $dogvideo->video = $fileNameToStore;
                $dogvideo->save();
            }
        }

        
        
        error_log("update susscc");



        return redirect('/home')->with('success', 'แก้ไขสุนัขได้สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  error_log("destroy");
        $dog = Dog::findOrFail($id);
        error_log("delete");
        if ($dog != null) {
            $dog->delete();
            return redirect()->back()->with(['dogdelete'=> 'ลบข้อมูลสุนัขสำเร็จ']);
        }
        return redirect()->back();
    }

    public function destroyimages($id)
    {  error_log("destroy");
        $dogimages = dogimages::findOrFail($id);
        error_log("delete");
        if ($dogimages != null) {
            $dogimages->delete();
            return redirect()->back()->with(['dogimages'=> 'ลบรูปภาพสำเร็จ']);
        }
        return redirect()->back();
    }



    public function post($iddog, $id)
    {
        error_log($iddog);
        $user =  User::find($id);
        if ($user->license == 'noimage.jpg' || $user->Farmaddress == NULL) {
            return view('user.EditProfileuser')->with('error','กรุณาเพิ่มที่อยู่ฟาร์มหรือใบอนุญาตจำกสมาคม');
        } else {

            $post = Dog::findOrFail($iddog);

            return view('post.post', compact('post'));
        }


        //return redirect('user/{id}')->with('Dogs',$post->Dogs);
    }
    public function showbreedm($id)
    {
        error_log($id);
        $Dogs = DB::table('dogs')->where('idthedog',$id)->get();
        error_log($Dogs);
        if ($Dogs == '[]') {
            error_log('if');
            return redirect()->back()->with('not','ไม่มี');
        } else {
            error_log('else');
            return view('Dog.dog-details',compact('Dogs','id'));
        }
        
         //ถ้าไม่เจอพ่อก็ให้รีหน้าเดิม
       
    }
    
    public function showgene($id){

        $dogs = Dog::find($id);
        return view('gene.gene',compact('dogs',$dogs));

    }
    public function  Requestpost($id){
        //ขอโพส
        $dog = Dog::find($id);
        if ($dog->imageCP != "noimage.jpg") {
            $dog->Status = 1;
            $dog->save();
            return redirect()->back();
        } elseif($dog->imageCP == "noimage.jpg") {
            return redirect()->back()->with('nocp','กรุณาเพิ่มใบ Certified Pedigree');
        }
        
 
    }
    public function  Allowpost($id){

        //อณุยาทแล้ว
        $dog = Dog::find($id);
        $dog->Status = 2;
        $dog->save();
        $user = User::find($dog->user_id);
        $user->score = $user->score + 1;
        $user->save();
        return redirect()->back();

    }
}
