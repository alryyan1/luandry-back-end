<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'دل باستا',
                'image_url' => '6763ac5d7b102.jpeg',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'خفائف و معجنات',
                'image_url' => '6763ac5d601e6.jpeg',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'السلطات',
                'image_url' => '6763ac5d636eb.jpeg',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'الاطباق الاساسيه',
                'image_url' => '6763ac5d636eb.jpeg',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'الدجاج',
                'image_url' => '6763ac5d6a033.jpeg',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'البحريات',
                'image_url' => '6763ac5d6d6e2.jpeg',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'اللحوم',
                'image_url' => '6763ac5d711d0.jpeg',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'الذبائح',
                'image_url' => '6763ac5d748ab.jpeg',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'مفرزنات',
                'image_url' => '6763ac5d78061.png',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'الحلويات',
                'image_url' => '6763ac5d7b102.jpeg',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'المشروبات',
                'image_url' => '6763ac5d7e1c2.jpeg',
            ),
        ));
        
        
    }
}