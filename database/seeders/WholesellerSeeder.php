<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wholeseller;
use Illuminate\Support\Facades\Hash;

class WholesellerSeeder extends Seeder
{

    public function run()
    {
    Wholeseller::create([
    'name'=>'Wholeseller_1',
    'email'=>'wholeseller@gmail.com',
    'password'=>Hash::make('admin'),
    'profile_picture'=>'null',
    'role'=>1,    
    ]);
    }
}
