<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.access-control.admin-user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      return view('backend.pages.access-control.admin-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request;
      /** validation */
        $request->validate([
          'name' => 'required|max:100',
          'email' => 'required|email|max:200|unique:admins,email',
          'password' => 'required|min:6',
          'password_confirmation' => 'required_with:password|min:6',
          'avatar' => 'image',
          'role' => 'required'
        ]);

          /**
          * Image resizing and saving in defined dir
          */
          if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            // Garbing the original image name
            $imageName = $image->getClientOriginalName();
            // Changing the name
            $newImageName = time().'-'.$imageName;
            // intervention Make image
            $imageResize = Image::make($image->getRealPath());
            // fitting image
            $imageResize->fit(150, 150);
            // saving image
            $imageResize->save(public_path('storage/backend/avatar/'.$newImageName), 80);
          }

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        if($request->hasFile('avatar')){
          $admin->avatar = $newImageName;
        }
        $admin->save();

        //role assign to user
        $admin->assignRole($request->role);
        toast('Admin has been created!','success')->width('23rem');
        return redirect()->route('admin.admin-user.index');
        
       
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
        //
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
