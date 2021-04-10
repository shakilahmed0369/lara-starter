<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;
use App\Models\Webinfo;
use App\Models\Webproperties;

class SettignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $webinfo = new Webinfo;
        $webinfo->c_name = 'demos';
        $webinfo->web_name = 'demos';
        $webinfo->web_url = 'demos';
        $webinfo->site_description = 'demos';
        $webinfo->meta_keyword = 'demos';
        $webinfo->footer_info = 'demos';
        $webinfo->save();

        $contactinfo = new ContactInfo;
        $contactinfo->street = 'demo';
        $contactinfo->city = 'demo';
        $contactinfo->post_code = 'demo';
        $contactinfo->state = 'demo';
        $contactinfo->country = 'demo';
        $contactinfo->full_adds = 'demo';
        $contactinfo->save();


        $propertes = new Webproperties();
        $propertes->header_logo = 'demo';
        $propertes->footer_logo = 'demo';
        $propertes->favicon = 'demo';
        $propertes->admin_logo = 'demo';
        $propertes->save();
    }
}
