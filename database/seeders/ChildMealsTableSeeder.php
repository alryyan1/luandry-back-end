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
                'meal_id' => 84,
                'service_id' => 1,
                'quantity' => 1,
                'created_at' => '2024-12-16 17:49:04',
                'updated_at' => '2024-12-16 17:49:04',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'meal_id' => 69,
                'service_id' => 1,
                'quantity' => 30,
                'created_at' => '2024-12-16 17:53:57',
                'updated_at' => '2024-12-16 17:55:09',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'meal_id' => 69,
                'service_id' => 2,
                'quantity' => 30,
                'created_at' => '2024-12-16 17:54:10',
                'updated_at' => '2024-12-16 17:55:12',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'meal_id' => 69,
                'service_id' => 3,
                'quantity' => 20,
                'created_at' => '2024-12-16 17:54:19',
                'updated_at' => '2024-12-16 17:55:14',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'meal_id' => 69,
                'service_id' => 4,
                'quantity' => 10,
                'created_at' => '2024-12-16 17:54:25',
                'updated_at' => '2024-12-16 17:55:15',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'meal_id' => 69,
                'service_id' => 5,
                'quantity' => 5,
                'created_at' => '2024-12-16 17:54:38',
                'updated_at' => '2024-12-16 17:55:19',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'meal_id' => 69,
                'service_id' => 6,
                'quantity' => 20,
                'created_at' => '2024-12-16 17:54:45',
                'updated_at' => '2024-12-16 17:55:25',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'meal_id' => 69,
                'service_id' => 7,
                'quantity' => 1,
                'created_at' => '2024-12-16 17:54:56',
                'updated_at' => '2024-12-16 17:54:56',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'meal_id' => 69,
                'service_id' => 8,
                'quantity' => 1,
                'created_at' => '2024-12-16 17:54:59',
                'updated_at' => '2024-12-16 17:54:59',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'meal_id' => 71,
                'service_id' => 1,
                'quantity' => 50,
                'created_at' => '2024-12-16 19:05:26',
                'updated_at' => '2024-12-16 19:06:25',
                'price' => 9.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'meal_id' => 71,
                'service_id' => 1,
                'quantity' => 100,
                'created_at' => '2024-12-16 19:05:56',
                'updated_at' => '2024-12-16 19:06:28',
                'price' => 17.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'meal_id' => 71,
                'service_id' => 1,
                'quantity' => 200,
                'created_at' => '2024-12-16 19:06:00',
                'updated_at' => '2024-12-16 19:06:33',
                'price' => 30.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
        ));
        
        
    }
}