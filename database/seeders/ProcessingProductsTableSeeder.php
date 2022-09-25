<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProcessingProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('processing_products')->delete();
        
        
        
    }
}