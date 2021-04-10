<?php

namespace Database\Seeders;

use App\Http\Controllers\Backend\SettingsController;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory(1)->create();
        $this->call(PermissionSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SettignsSeeder::class);
    }
}
