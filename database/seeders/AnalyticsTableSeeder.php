<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnalyticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('analytics')->delete();
        
        
        
    }
}