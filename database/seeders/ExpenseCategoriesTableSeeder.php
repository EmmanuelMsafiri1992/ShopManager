<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExpenseCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('expense_categories')->delete();
        
        
        
    }
}