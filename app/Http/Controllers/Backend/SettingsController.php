<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\Webinfo;
use App\Models\Webproperties;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class SettingsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware(['permission:edit-Site-Settings', 'auth:admin']);
    }
    function index()
    {
        $webInfo       = Webinfo::first();
        $contactInfo   = ContactInfo::first();
        $webProperties = Webproperties::first();
        return view('backend.pages.settings.settings', compact('webInfo', 'contactInfo', 'webProperties'));
    }

    public function WebinfoUpdate(Request $request)
    {
        //return $request;
        $update                   = Webinfo::first();
        $update->c_name           = $request->c_name;
        $update->web_name         = $request->web_name;
        $update->web_url          = $request->web_url;
        $update->site_description = $request->site_description;
        $update->meta_keyword     = $request->meta_keyword;
        $update->footer_info      = $request->footer_info;
        $update->save();
        toast('Settings Updated successfully!', 'success');
        return redirect()->back(); 
    }

    public function ContactInfoUpdate(Request $request)
    {
        //return $request;
        $update            = ContactInfo::first();
        $update->street    = $request->street;
        $update->city      = $request->city;
        $update->post_code = $request->post_code;
        $update->state     = $request->state;
        $update->country   = $request->country;
        $update->full_adds = $request->full_adds;
        $update->fb        = $request->fb;
        $update->tw        = $request->tw;
        $update->yt        = $request->yt;
        $update->email        = $request->email;
        $update->save();
        toast('Settings Updated successfully!', 'success');
        return redirect()->back();
    }

    public function ImageUpdate(Request $request)
    {
        //dd($request->file('header_logo'));

         //validation
         $request->validate([
            'header_logo' => 'image',
            'footer_logo' => 'image',
            'favicon'     => 'image',
            'admin_logo'  => 'image',
            
        ]);

         /**
          * Image resizing and saving in defined dirs
          */
          $imageUpdate = Webproperties::first();

          $requestNames = ['header_logo', 'footer_logo', 'favicon', 'admin_logo'];

          foreach($requestNames as $name){

             if($request->hasFile($name)){
   
                $image = $request->file($name);
                // Garbing the original image name
                $imageName = $image->getClientOriginalName();
                // Changing the name
                $newImageName = str_replace(' ', '', uniqid().'-'.$imageName);
                // intervention Make image
                $imageResize = Image::make($image->getRealPath());
                // saving image
                $imageResize->save(public_path('storage/backend/logos/'.$newImageName), 80);
                //deleting old image
                File:: delete(public_path('storage/backend/logos/'.$imageUpdate[$name]));
                $imageUpdate[$name] = $newImageName;
                $imageUpdate->save();
                }
          }
         
        toast('Settings Updated successfully!', 'success');
        return redirect()->back();
    }
}
