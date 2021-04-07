<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
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
          'group_name' => 'Menu',
          'permission' =>
          [
            'read-Menu',
            'create-Menu',
            'edit-Menu',
            'delete-Menu'
          ]
        ],

        [
          'group_name' => 'Site-Settings',
          'permission' =>
          [
            'edit-Site-Settings'
          ]
        ],
        
        [
          'group_name' => 'Admin-User',
          'permission' =>
          [
            'read-Admin-User',
            'create-Admin-User',
            'edit-Admin-User',
            'delete-Admin-User'
          ]
          ],

        [
            'group_name' => 'Role',
            'permission' =>
            [
              'read-Role',
              'create-Role',
              'edit-Role',
              'delete-Role'
            ]
          ]
        
      ];
    //creating role
    $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
    //assigning role to first user
    $user = Admin::first();
    $user->assignRole('super-admin');

    foreach ($permissions as $permission) {
      //create premisses
      foreach ($permission['permission'] as $singlePermission) {
        $permission = Permission::create(['name' => $singlePermission, 'group_name' => $permission['group_name'], 'guard_name' => 'admin']);
        // assign each permission to role
        $role->givePermissionTo($permission);
      }
    };
  }
}
