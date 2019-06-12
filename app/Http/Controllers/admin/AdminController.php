<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use Auth;
use DB;
use App\Dog;
class AdminController extends Controller
{
    
   
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        error_log('dashboardadmin');
        $users = User::all();
        return view('admin/dashboard', compact('users'));
    }
    public function indexdogs()
    {
        error_log('listdogsadmin');
        $Dogs = Dog::all();
        return view('admin/listdogs', compact('Dogs'));
        error_log('listdogsadmin2');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        error_log($id);
        error_log('edituseradmin');
        //$user = User::find('1');
        $user = User::find($id);
          return view('admin.editdashboard',compact('user'));
          
    }

    public function update($id)
    {
        error_log('updateuseradmin');
        
        
        $user = User::find($id);
        $user->name = request()->input('name');
        $user->DateofBirth = request()->input('DateofBirth');
        $user->Tel = request()->input('Tel');
        $user->SEX = request()->input('SEX');
        $user->IDcardnumber = request()->input('IDcardnumber');
        $user->address = request()->input('address');
        
        $user->save();
        error_log('updateuseradmin2');
        return redirect('/admin/dashboard');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/dashboard');
    }



}
