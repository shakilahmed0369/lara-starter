<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Admin;
use File;

class AdminProfileController extends Controller
{
    public function index()
    {
        $profile = Admin::find(auth('admin')->user()->id);
        return view('backend.pages.admin-profile.index', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        //making object and validation id
        $admin = Admin::findOrFail($id);

        /** validation */
        $request->validate([
            'name' => 'required|max:100',
            'email' => "required|email|max:200|unique:admins,email,$admin->id",
            'avatar' => 'image',
        ]);

        /** if user want to change password
         *  we will shoot a password validation
         *  else we don't.
         */
        if ($request->filled('password') or $request->filled('confirm_password')) {
            $request->validate([
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|min:6',
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
            // deleting previous image
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
        toast('Admin user updated!', 'success')->width('23rem');
        return redirect()->route('admin.profile');
    }
}
