<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseReturnsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchase_returns')->delete();
        
        
        
    }
}