<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChildMealsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('child_meals')->delete();
        
        \DB::table('child_meals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'meal_id' => 2,
                'quantity' => 1,
                'name' => 'IRON-AR كي سريع',
                'created_at' => '2024-11-13 12:11:40',
                'updated_at' => '2024-11-13 12:11:40',
                'price' => 0.3,
                'people_count' => '1',
                'weight' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'meal_id' => 2,
                'quantity' => 1,
                'name' => 'WASH DRY-AR غسيل جاف سريع',
                'created_at' => '2024-11-13 12:29:45',
                'updated_at' => '2024-11-13 12:29:45',
                'price' => 0.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'meal_id' => 2,
                'quantity' => 1,
                'name' => 'WASH-NORMAL-AR غسيل وكسي سريع',
                'created_at' => '2024-11-13 12:30:50',
                'updated_at' => '2024-11-13 12:30:50',
                'price' => 0.2,
                'people_count' => '1',
                'weight' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'meal_id' => 2,
                'quantity' => 1,
                'name' => 'WASH-DRY غسيل جاف',
                'created_at' => '2024-11-13 12:30:58',
                'updated_at' => '2024-11-13 12:30:58',
                'price' => 0.2,
                'people_count' => '1',
                'weight' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'meal_id' => 2,
                'quantity' => 1,
                'name' => 'IRON كي',
                'created_at' => '2024-11-13 12:31:04',
                'updated_at' => '2024-11-13 12:31:04',
                'price' => 0.2,
                'people_count' => '1',
                'weight' => NULL,
            ),
        ));
        
        
    }
}