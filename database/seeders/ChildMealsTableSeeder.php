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
            1 => 
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
            2 => 
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
            3 => 
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
            4 => 
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
            5 => 
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
            6 => 
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
            7 => 
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
            8 => 
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
            9 => 
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
            10 => 
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
            11 => 
            array (
                'id' => 14,
                'meal_id' => 72,
                'service_id' => 2,
                'quantity' => 50,
                'created_at' => '2024-12-16 19:35:05',
                'updated_at' => '2024-12-16 19:35:34',
                'price' => 7.7,
                'people_count' => '1',
                'weight' => NULL,
            ),
            12 => 
            array (
                'id' => 15,
                'meal_id' => 72,
                'service_id' => 2,
                'quantity' => 100,
                'created_at' => '2024-12-16 19:35:07',
                'updated_at' => '2024-12-16 19:35:38',
                'price' => 15.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            13 => 
            array (
                'id' => 16,
                'meal_id' => 72,
                'service_id' => 2,
                'quantity' => 200,
                'created_at' => '2024-12-16 19:35:10',
                'updated_at' => '2024-12-16 19:35:43',
                'price' => 30.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            14 => 
            array (
                'id' => 17,
                'meal_id' => 73,
                'service_id' => 3,
                'quantity' => 50,
                'created_at' => '2024-12-16 19:36:00',
                'updated_at' => '2024-12-16 19:36:12',
                'price' => 6.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            15 => 
            array (
                'id' => 18,
                'meal_id' => 73,
                'service_id' => 3,
                'quantity' => 90,
                'created_at' => '2024-12-16 19:36:01',
                'updated_at' => '2024-12-16 19:36:13',
                'price' => 10.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            16 => 
            array (
                'id' => 19,
                'meal_id' => 74,
                'service_id' => 4,
                'quantity' => 30,
                'created_at' => '2024-12-16 19:36:25',
                'updated_at' => '2024-12-16 19:36:37',
                'price' => 3.3,
                'people_count' => '1',
                'weight' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'meal_id' => 74,
                'service_id' => 4,
                'quantity' => 50,
                'created_at' => '2024-12-16 19:36:27',
                'updated_at' => '2024-12-16 19:36:38',
                'price' => 5.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            18 => 
            array (
                'id' => 21,
                'meal_id' => 75,
                'service_id' => 6,
                'quantity' => 45,
                'created_at' => '2024-12-16 19:37:02',
                'updated_at' => '2024-12-16 19:37:20',
                'price' => 8.3,
                'people_count' => '1',
                'weight' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'meal_id' => 75,
                'service_id' => 6,
                'quantity' => 135,
                'created_at' => '2024-12-16 19:37:05',
                'updated_at' => '2024-12-16 19:37:28',
                'price' => 24.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'meal_id' => 76,
                'service_id' => 9,
                'quantity' => 45,
                'created_at' => '2024-12-16 19:37:44',
                'updated_at' => '2024-12-16 19:38:01',
                'price' => 7.7,
                'people_count' => '1',
                'weight' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'meal_id' => 76,
                'service_id' => 9,
                'quantity' => 135,
                'created_at' => '2024-12-16 19:37:46',
                'updated_at' => '2024-12-16 19:38:05',
                'price' => 23.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            22 => 
            array (
                'id' => 25,
                'meal_id' => 77,
                'service_id' => 10,
                'quantity' => 50,
                'created_at' => '2024-12-16 19:38:35',
                'updated_at' => '2024-12-16 19:38:46',
                'price' => 6.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            23 => 
            array (
                'id' => 26,
                'meal_id' => 77,
                'service_id' => 10,
                'quantity' => 100,
                'created_at' => '2024-12-16 19:38:36',
                'updated_at' => '2024-12-16 19:38:47',
                'price' => 12.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            24 => 
            array (
                'id' => 27,
                'meal_id' => 78,
                'service_id' => 11,
                'quantity' => 10,
                'created_at' => '2024-12-16 19:39:04',
                'updated_at' => '2024-12-16 19:39:20',
                'price' => 6.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            25 => 
            array (
                'id' => 28,
                'meal_id' => 78,
                'service_id' => 11,
                'quantity' => 20,
                'created_at' => '2024-12-16 19:39:08',
                'updated_at' => '2024-12-16 19:39:25',
                'price' => 12.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            26 => 
            array (
                'id' => 29,
                'meal_id' => 78,
                'service_id' => 11,
                'quantity' => 30,
                'created_at' => '2024-12-16 19:39:08',
                'updated_at' => '2024-12-16 19:39:33',
                'price' => 19.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            27 => 
            array (
                'id' => 30,
                'meal_id' => 81,
                'service_id' => 14,
                'quantity' => 1,
                'created_at' => '2024-12-16 19:40:15',
                'updated_at' => '2024-12-16 19:40:37',
                'price' => 3.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            28 => 
            array (
                'id' => 31,
                'meal_id' => 81,
                'service_id' => 14,
                'quantity' => 3,
                'created_at' => '2024-12-16 19:40:21',
                'updated_at' => '2024-12-16 19:40:41',
                'price' => 9.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            29 => 
            array (
                'id' => 32,
                'meal_id' => 81,
                'service_id' => 14,
                'quantity' => 6,
                'created_at' => '2024-12-16 19:40:23',
                'updated_at' => '2024-12-16 19:40:48',
                'price' => 17.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            30 => 
            array (
                'id' => 33,
                'meal_id' => 81,
                'service_id' => 14,
                'quantity' => 10,
                'created_at' => '2024-12-16 19:40:24',
                'updated_at' => '2024-12-16 19:40:50',
                'price' => 28.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            31 => 
            array (
                'id' => 34,
                'meal_id' => 82,
                'service_id' => 15,
                'quantity' => 1,
                'created_at' => '2024-12-16 19:41:20',
                'updated_at' => '2024-12-16 19:41:39',
                'price' => 3.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            32 => 
            array (
                'id' => 35,
                'meal_id' => 82,
                'service_id' => 15,
                'quantity' => 3,
                'created_at' => '2024-12-16 19:41:21',
                'updated_at' => '2024-12-16 19:41:40',
                'price' => 9.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            33 => 
            array (
                'id' => 36,
                'meal_id' => 82,
                'service_id' => 15,
                'quantity' => 6,
                'created_at' => '2024-12-16 19:41:22',
                'updated_at' => '2024-12-16 19:41:46',
                'price' => 17.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            34 => 
            array (
                'id' => 37,
                'meal_id' => 82,
                'service_id' => 15,
                'quantity' => 10,
                'created_at' => '2024-12-16 19:41:23',
                'updated_at' => '2024-12-16 19:41:51',
                'price' => 28.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            35 => 
            array (
                'id' => 38,
                'meal_id' => 83,
                'service_id' => 16,
                'quantity' => 1,
                'created_at' => '2024-12-16 19:42:04',
                'updated_at' => '2024-12-16 19:42:44',
                'price' => 2.3,
                'people_count' => '1',
                'weight' => NULL,
            ),
            36 => 
            array (
                'id' => 39,
                'meal_id' => 83,
                'service_id' => 16,
                'quantity' => 3,
                'created_at' => '2024-12-16 19:42:10',
                'updated_at' => '2024-12-16 19:42:48',
                'price' => 4.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            37 => 
            array (
                'id' => 40,
                'meal_id' => 83,
                'service_id' => 16,
                'quantity' => 3,
                'created_at' => '2024-12-16 19:42:11',
                'updated_at' => '2024-12-16 19:42:52',
                'price' => 11.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            38 => 
            array (
                'id' => 41,
                'meal_id' => 83,
                'service_id' => 16,
                'quantity' => 6,
                'created_at' => '2024-12-16 19:42:25',
                'updated_at' => '2024-12-16 19:42:57',
                'price' => 22.5,
                'people_count' => '1',
                'weight' => NULL,
            ),
            39 => 
            array (
                'id' => 43,
                'meal_id' => 84,
                'service_id' => 17,
                'quantity' => 1,
                'created_at' => '2024-12-16 19:44:58',
                'updated_at' => '2024-12-16 19:45:02',
                'price' => 2.9,
                'people_count' => '1',
                'weight' => NULL,
            ),
            40 => 
            array (
                'id' => 44,
                'meal_id' => 84,
                'service_id' => 18,
                'quantity' => 1,
                'created_at' => '2024-12-16 19:46:49',
                'updated_at' => '2024-12-16 19:47:15',
                'price' => 2.9,
                'people_count' => '1',
                'weight' => NULL,
            ),
            41 => 
            array (
                'id' => 46,
                'meal_id' => 84,
                'service_id' => 19,
                'quantity' => 1,
                'created_at' => '2024-12-17 13:19:26',
                'updated_at' => '2024-12-17 13:19:43',
                'price' => 1.1,
                'people_count' => '1',
                'weight' => NULL,
            ),
            42 => 
            array (
                'id' => 47,
                'meal_id' => 85,
                'service_id' => 46,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:38:59',
                'updated_at' => '2024-12-19 07:38:59',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            43 => 
            array (
                'id' => 48,
                'meal_id' => 86,
                'service_id' => 47,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:39:29',
                'updated_at' => '2024-12-19 07:39:29',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            44 => 
            array (
                'id' => 49,
                'meal_id' => 87,
                'service_id' => 48,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:39:52',
                'updated_at' => '2024-12-19 07:39:52',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            45 => 
            array (
                'id' => 50,
                'meal_id' => 88,
                'service_id' => 49,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:40:14',
                'updated_at' => '2024-12-19 07:40:14',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            46 => 
            array (
                'id' => 51,
                'meal_id' => 89,
                'service_id' => 50,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:40:33',
                'updated_at' => '2024-12-19 07:40:33',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            47 => 
            array (
                'id' => 52,
                'meal_id' => 90,
                'service_id' => 51,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:41:14',
                'updated_at' => '2024-12-19 07:41:14',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            48 => 
            array (
                'id' => 53,
                'meal_id' => 92,
                'service_id' => 53,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:43:05',
                'updated_at' => '2024-12-19 07:43:05',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
            49 => 
            array (
                'id' => 54,
                'meal_id' => 93,
                'service_id' => 54,
                'quantity' => 1,
                'created_at' => '2024-12-19 07:43:26',
                'updated_at' => '2024-12-19 07:43:26',
                'price' => 0.0,
                'people_count' => '1',
                'weight' => NULL,
            ),
        ));
        
        
    }
}