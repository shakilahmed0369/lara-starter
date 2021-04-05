<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $menus = array(
      array('id' => '11', 'parent_id' => '0', 'order' => '0', 'name' => 'Dashboard', 'icon' => 'fas fa-columns', 'uri' => 'dashboard', 'permissions' => '["read-Menu","create-Menu","edit-Menu","delete-Menu","read-Admin-User","create-Admin-User","edit-Admin-User","delete-Admin-User","read-Role","create-Role","edit-Role","delete-Role"]', 'created_at' => '2021-04-01 02:47:01', 'updated_at' => '2021-04-03 04:49:31'),
      array('id' => '12', 'parent_id' => '0', 'order' => '1', 'name' => 'Access Control', 'icon' => 'fas fa-lock', 'uri' => 'access-control', 'permissions' => '["read-Admin-User","read-Role"]', 'created_at' => '2021-04-01 02:49:53', 'updated_at' => '2021-04-03 04:49:25'),
      array('id' => '13', 'parent_id' => '12', 'order' => '2', 'name' => 'Roles', 'icon' => 'fas fa-chess-king', 'uri' => 'admin/role', 'permissions' => '["read-Role","create-Role","edit-Role","delete-Role"]', 'created_at' => '2021-04-01 02:51:07', 'updated_at' => '2021-04-03 04:49:13'),
      array('id' => '14', 'parent_id' => '12', 'order' => '3', 'name' => 'Admin Users', 'icon' => 'fas fa-user-shield', 'uri' => 'admin/admin-user', 'permissions' => '["read-Admin-User","create-Admin-User","edit-Admin-User","delete-Admin-User"]', 'created_at' => '2021-04-01 02:52:10', 'updated_at' => '2021-04-03 04:49:07'),
      array('id' => '15', 'parent_id' => '0', 'order' => '4', 'name' => 'Admin Aria', 'icon' => 'fas fa-hammer', 'uri' => 'admin-aria', 'permissions' => '["read-Menu"]', 'created_at' => '2021-04-01 02:53:44', 'updated_at' => '2021-04-03 04:47:44'),
      array('id' => '16', 'parent_id' => '15', 'order' => '5', 'name' => 'Menu', 'icon' => 'fas fa-bars', 'uri' => 'admin/menu', 'permissions' => '["read-Menu","create-Menu","edit-Menu","delete-Menu"]', 'created_at' => '2021-04-01 02:54:10', 'updated_at' => '2021-04-03 04:48:46'),
      array('id' => '17', 'parent_id' => '15', 'order' => '6', 'name' => 'Env Editor', 'icon' => 'fas fa-file-signature', 'uri' => 'admin/env-editor', 'permissions' => 'null', 'created_at' => '2021-04-04 20:31:12', 'updated_at' => '2021-04-05 15:07:20'),
      array('id' => '18', 'parent_id' => '15', 'order' => '7', 'name' => 'Backup Manager', 'icon' => 'fas fa-hdd', 'uri' => 'admin/backup', 'permissions' => 'null', 'created_at' => '2021-04-05 13:52:34', 'updated_at' => '2021-04-05 13:52:39')
    );

    DB::table('menus')->insert($menus);
  }
}
