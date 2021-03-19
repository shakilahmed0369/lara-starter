<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // index view
     // | making role -> and assigening permission
     // view must be organized -__-

    public function index()
    {
        return view('backend.pages.access-control.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $permissions = Permission::all()->groupBy('group_name');
        //toast('Your Post as been submited!','success')->width('24rem');
        return view('backend.pages.access-control.role.create', compact('permissions'));
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
          'role_name' => 'required|unique:roles,name'
        ]);

        /* creating role */
        $role = Role::create(['name' => $request->role_name, 'guard_name' => 'admin']);
        /** assigning permission to created role */
        $role->syncPermissions($request->permissions);
        /** sweet alert */
        toast('Role has been created!','success')->width('23rem');
        return redirect()->route('admin.role.index');
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
        $permissions = Permission::all()->groupBy('group_name');
        $editRole = Role::findOrFail($id);
        
        return view('backend.pages.access-control.role.edit', compact('editRole', 'permissions'));
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
      $role = Role::findOrFail($id);
      $role->syncPermissions($request->permissions);
      toast('Role has been Updated!','success')->width('23rem');
      return redirect()->route('admin.role.index');
    }
}
