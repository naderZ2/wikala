<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=
        [
            'name'=>"admin",
            "email"=>"admin@admin.com",
            "password"=>"admin"
        ];
        Admin::create($admin);
    }
}
