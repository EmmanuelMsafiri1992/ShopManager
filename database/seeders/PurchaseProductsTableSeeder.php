<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchase_products')->delete();
        
        
        
    }
}