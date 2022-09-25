<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'System Admin',
                'email' => 'superadmin@productify.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$1aOB3UxMDbMC05w.lc0jQ.X7346hlbUJuIzzYbSIQRC98IpvSNDOK',
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