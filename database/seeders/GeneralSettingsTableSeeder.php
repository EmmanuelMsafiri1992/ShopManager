<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GeneralSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('general_settings')->delete();
        
        \DB::table('general_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'company_name',
                'display_name' => 'Company Name',
                'value' => 'SMS',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:48:37',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'compnay_tagline',
                'display_name' => 'Compnay Tagline',
                'value' => 'Shop Management System',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:48:37',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'email_address',
                'display_name' => 'Email Address',
                'value' => 'support@shopmanager.com',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:48:37',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'phone_number',
                'display_name' => 'Phone Number',
                'value' => '0681003281',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:48:37',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'address',
                'display_name' => 'Address',
                'value' => 'Mirpur-10, Dhaka-1216, Bangladesh',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'currency_name',
                'display_name' => 'Currency Name',
                'value' => 'USD',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'currency_symbol',
                'display_name' => 'Currency Symbol',
                'value' => '$',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'currency_position',
                'display_name' => 'Currency Position',
                'value' => 'left',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'timezone',
                'display_name' => 'Timezone',
                'value' => 'America/New_York',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'purchase_code_prefix',
                'display_name' => 'Purchase Code Prefix',
                'value' => 'PUR-',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'processing_code_prefix',
                'display_name' => 'Processing Code Prefix',
                'value' => 'PRO-',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'finished_code_prefix',
                'display_name' => 'Finished Code Prefix',
                'value' => 'FIN-',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'transferred_code_prefix',
                'display_name' => 'Transferred Code Prefix',
                'value' => 'TRA-',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'starting_purchase_code',
                'display_name' => 'Starting Purchase Code',
                'value' => '1',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'logo',
                'display_name' => 'Logo',
                'value' => 'dark-logo.png',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'small_logo',
                'display_name' => 'Small Logo',
                'value' => 'small-dark-logo.png',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'dark_logo',
                'display_name' => 'Dark Logo',
                'value' => 'white-logo.png',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'small_dark_logo',
                'display_name' => 'Small Dark Logo',
                'value' => 'white-small-logo.png',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'favicon',
                'display_name' => 'Favicon',
                'value' => 'favicon.ico',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:42:56',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'copyright',
                'display_name' => 'Copyright',
                'value' => 'Copyright © 2022 SMS All rights reserved',
                'created_at' => '2022-09-23 12:42:56',
                'updated_at' => '2022-09-23 12:48:52',
            ),
        ));
        
        
    }
}