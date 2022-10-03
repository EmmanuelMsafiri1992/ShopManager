<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        SuperAdmin::create([
            'name'=>'Superadmin_1',
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('admin'),
            'profile_picture'=>'null',
            'role'=>1,    
            ]);
            }
}
