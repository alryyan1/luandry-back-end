<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'IRON-AR كي سريع',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'WASH DRY-AR غسيل جاف سريع',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'WASH-NORMAL-AR غسيل وكي سريع',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'WASH-DRY غسيل جاف',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'IRON كي',
            ),
        ));
        
        
    }
}