<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions = 
      [
        [
          'group_name' => 'Role',
          'permission' => 
            [
              'readRole',
              'createRole',
              'editRole',
              'deleteRole'
            ]
          ],
          [
            'group_name' => 'User',
            'permission' => 
            [
              'readUser',
              'createUser',
              'editUser',
              'deleteUser'
            ]
          ]
      ];
      //creating role
      $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
      //assigning role to first user
      $user = Admin::first();
      $user->assignRole('super-admin');

      foreach($permissions as $permission){
        //create permissons
        foreach($permission['permission'] as $singlePermission){
          $permission = Permission::create(['name' => $singlePermission, 'group_name' => $permission['group_name'], 'guard_name' => 'admin']);
          // assign each permission to role
          $role->givePermissionTo($permission);
        }
      };
    }
}
