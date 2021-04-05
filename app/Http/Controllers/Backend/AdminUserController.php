<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;
use App\Notifications\AdminCreated;
use File;

class AdminUserController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->middleware(['permission:read-Admin-User','auth:admin'])->only(['index']);
    $this->middleware(['permission:create-Admin-User','auth:admin'])->only(['create', 'store']);
    $this->middleware(['permission:edit-Admin-User','auth:admin'])->only(['edit', 'update']);
  }
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
    /** validation */
    $request->validate([
      'name' => 'required|max:100',
      'email' => 'required|email|max:200|unique:admins,email',
      'password' => 'required|min:6',
      'password_confirmation' => 'required_with:password|same:password|min:6',
      'avatar' => 'image',
      'role' => 'required'
    ]);

    /**
     * Image resizing and saving in defined dir
     */
    if ($request->hasFile('avatar')) {
      $image = $request->file('avatar');
      // Garbing the original image name
      $imageName = $image->getClientOriginalName();
      // Changing the name
      $newImageName = time() . '-' . $imageName;
      // intervention Make image
      $imageResize = Image::make($image->getRealPath());
      // fitting image
      $imageResize->fit(150, 150);
      // saving image
      $imageResize->save(public_path('storage/backend/avatar/' . $newImageName), 80);
    }

    $admin = new Admin();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->password = bcrypt($request->password);
    if ($request->hasFile('avatar')) {
      $admin->avatar = $newImageName;
    }
    $admin->save();

    //role assign to user
    $admin->assignRole($request->role);

    //sending mail to the user
    $admin->notify(new AdminCreated($request));

    toast('Admin has been created!', 'success')->width('23rem');
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

    if ( $id === 1 ) {
      return abort(401);
    } 
      $roles = Role::all();
      $adminUserEdit = Admin::findOrFail($id);
      return view('backend.pages.access-control.admin-user.edit', compact('adminUserEdit', 'roles'));
    
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
    if($id === 1) {
      return abort(401);
    }

    //making object and validation id
    $admin = Admin::findOrFail($id);

    /** validation */
    $request->validate([
      'name' => 'required|max:100',
      'email' => "required|email|max:200|unique:admins,email,$admin->id",
      'avatar' => 'image',
      'role' => 'required'
    ]);

    /** if user want to change password
     *  we will shoot a password validation
     *  else we dont.
     */
    if ($request->filled('password') or $request->filled('confirm_password')) {
      $request->validate([
        'password' => 'required|min:6',
        'password_confirmation' => 'required_with:password|same:password|min:6',
      ]);
    }

    /**
     * Image resizing and saving in defined dir
     */
    if ($request->hasFile('avatar')) {
      $image = $request->file('avatar');
      // Garbing the original image name
      $imageName = $image->getClientOriginalName();
      // Changing the name
      $newImageName = time() . '-' . $imageName;
      // intervention Make image
      $imageResize = Image::make($image->getRealPath());
      // fitting image
      $imageResize->fit(150, 150);
      //image dir
      $dir = 'storage/backend/avatar/';
      // saving image
      $imageResize->save(public_path($dir . $newImageName), 80);
      // deleteing previous image
      File::delete($dir . $admin->avatar);
    }


    $admin->name = $request->name;
    $admin->email = $request->email;
    if ($request->filled('password')) {
      $admin->password = bcrypt($request->password);
    }
    if ($request->hasFile('avatar')) {
      $admin->avatar = $newImageName;
    }
    $admin->save();

    //role assign to user
    $admin->syncRoles($request->role);
    toast('Admin user updated!', 'success')->width('23rem');
    return redirect()->route('admin.admin-user.index');
  }
}
