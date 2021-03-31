<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->get()->groupBy('group_name');
        $menu        = Menu::all();
        $parentItems = Menu::where('parent_id', 0)->orderBy('order')->get();
        return view('backend.pages.admin-aria.menu.index', compact('menu', 'parentItems', 'permissions'));
    }

    public function updaterow(Request $request)
    {
        $ids = [];
        /* gettign a json object from $request 
        |  and the object will carry parent ids
        |  and child ids with in it
        */
        foreach ($request->menu as $menu) {
            /* we will get the each parent id and
            | make there parent_id = 0 in db (0 goes for parent eliment)
            */
            $ids[]                      = $menu['id'];
                 $menuParent            = Menu::find($menu['id']);
                 $menuParent->parent_id = 0;
            $menuParent->save();
            if (isset($menu['children'])) {
                /* 
                | if menu have any child then we will get that
                | id and assigen it to the parent id 
                */
                foreach ($menu['children'] as $menuId) {
                    $ids[]                     = $menuId['id'];
                         $menuChild            = Menu::find($menuId['id']);
                         $menuChild->parent_id = $menu['id'];
                    $menuChild->save();
                }
            }
        }

        foreach ($ids as $key => $id) {
            $menuOrder        = Menu::find($id);
            $menuOrder->order = $key;
            $menuOrder->save();
        }
        return response($ids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* fild validateion */
        $request->validate([
            'name'        => 'required',
            'uri'         => 'required|unique:menus,uri',
            'icon'        => 'required',
        ]);
        /* count current item in menu */
        $menuItemCounter = Menu::count();

        $menu              = new Menu();
        $menu->name        = $request->name;
        $menu->parent_id   = 0;
        $menu->uri         = $request->uri;
        $menu->icon        = $request->icon;
        $menu->permissions = json_encode($request->permissions);
        $menu->order       = $menuItemCounter + 1;
        $menu->save();
        toast('Menu item created!', 'success')->width('23rem');

        return redirect()->route('admin.menu.index');
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
        $editValue = Menu::find($id);
        $permissions = Permission::orderBy('created_at', 'desc')->get()->groupBy('group_name');
        $menu        = Menu::all();
        $parentItems = Menu::where('parent_id', 0)->orderBy('order')->get();
        return view('backend.pages.admin-aria.menu.edit', compact('menu', 'parentItems', 'permissions', 'editValue'));
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
        /* fild validateion */
        $request->validate([
            'name'        => 'required',
            'uri'         => 'required|unique:menus,uri,'.$id,
            'icon'        => 'required',
        ]);
        /* count current item in menu */
        $menuItemCounter = Menu::count();

        $menu              = Menu::find($id);
        $menu->name        = $request->name;
        $menu->uri         = $request->uri;
        $menu->icon        = $request->icon;
        $menu->permissions = json_encode($request->permissions);
        $menu->save();
        toast('Menu item Updated!', 'success')->width('23rem');

        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $distroy = Menu::find($id);
       $distroy->delete();
       return response(true);
    }
}
