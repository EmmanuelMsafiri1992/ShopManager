<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Retailer;
use Illuminate\Support\Facades\Hash;

class RetailerSeeder extends Seeder
{

    public function run()
    {
    Retailer::create([
    'name'=>'Retailer_1',
    'email'=>'retailer@gmail.com',
    'password'=>Hash::make('admin'),
    'profile_picture'=>'null',
    'role'=>1,    
    ]);
    }
}
