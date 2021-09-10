<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\Triats\PDFGenrator;
use App\Http\Controllers\Admin\Triats\exports\UserExport;
use App\Http\Controllers\Admin\Triats\emports\EmportUser;

class UserController extends Controller
{ 
     use PDFGenrator , UserExport , EmportUser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        // return $users ;
        return view('admin.user.all' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all(); 
        $rules = [
            'name' => ['required' ,'min:4' , 'max:25'] , 
            'email' => ['required' , 'unique:users'] , 
            'password' =>['required'] , 
            'role' => ['required'] , 
            'image' => ['mimes:jpg,bmp,png,jpeg' , 'size:512']

        ]; 
        $validator =Validator::make($data , $rules) ;
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
            //storeimage
            $profilePicture = $request->file('image');
            $picName = time()."_".$profilePicture->getClientOriginalName();
            $profilePicture->move('adminpanel\img' ,$picName);

        User::create([
            'name' => $request->name ,
            'email' => $request->email , 
            'password' => Hash::make($request->password) ,
            'role_id' => $request->role ,
            'image' => $picName ,

        ]);
        return redirect()->back();
        // return redirect()->route('user.index');
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
        $user = User::findOrFail($id);
        return view('admin.user.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.user.edit' , compact('user'));
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
        //
        $data = $request->all(); 
        $rules = [
            'name' => ['required' ,'min:4' , 'max:25'] , 
            'email' => ['required' , 'unique:users'] , 
        ]; 
        $validator =Validator::make($data , $rules) ;
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $user = User::findOrFail($id);
        $user->update([
            "name" => $request->name , 
            "email" =>$request->email 
        ]);
        return redirect()->back();
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function showposts($id){
       $posts = User::findOrFail($id)->posts;
       return view('admin.user.showpost' , compact('posts'));
    }
    
}
