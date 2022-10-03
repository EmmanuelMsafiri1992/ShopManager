<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{

    public function run()
    {
    Customer::create([
    'name'=>'Customer_1',
    'email'=>'customer@gmail.com',
    'password'=>Hash::make('admin'),
    'profile_picture'=>'null',
    'role'=>1,    
    ]);
    }
}
