<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransferredProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transferred_products')->delete();
        
        
        
    }
}