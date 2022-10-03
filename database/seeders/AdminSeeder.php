<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run()
    {
    Admin::create([
    'name'=>'Admin_1',
    'email'=>'admin@gmail.com',
    'password'=>Hash::make('admin'),
    'profile_picture'=>'null',
    'role'=>1,    
    ]);
    }
}
