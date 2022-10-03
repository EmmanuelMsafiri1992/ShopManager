<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shopkeeper;
use Illuminate\Support\Facades\Hash;

class ShopkeeperSeeder extends Seeder
{

    public function run()
    {
    Shopkeeper::create([
    'name'=>'Shopkeeper_1',
    'email'=>'shopkeeper@gmail.com',
    'password'=>Hash::make('admin'),
    'profile_picture'=>'null',
    'role'=>1,    
    ]);
    }
}
