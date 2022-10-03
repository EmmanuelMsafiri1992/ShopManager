<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
public function run()
{
\DB::table('users')->delete();
\DB::table('users')->insert(array (
0 => 
array (
'id' => 1,
'name' => 'System Admin',
'email' => 'superadmin@gmail.com',
'email_verified_at' => NULL,
'password' => Hash::make('admin'),
'profile_picture' => NULL,
'role' => '1',
'status' => 1,
'remember_token' => NULL,
'created_at' => '2022-09-23 12:42:54',
'updated_at' => '2022-09-23 12:42:54',
),
));
}
}