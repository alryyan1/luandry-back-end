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
                'id' => 3,
                'name' => 'WASH & Ironing غسيل و كي',
                'price' => 0.0,
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'WASH غسيل ',
                'price' => 0.0,
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'IRON كي',
                'price' => 0.0,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Fast Wash غسيل سريع ',
                'price' => 0.0,
            ),
            4 => 
            array (
                'id' => 8,
                'name' => ' Fast Ironing كي سريع',
                'price' => 0.0,
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Fast Ironing & Fast Wash  كي سريع -غسيل سريع',
                'price' => 0.0,
            ),
        ));
        
        
    }
}