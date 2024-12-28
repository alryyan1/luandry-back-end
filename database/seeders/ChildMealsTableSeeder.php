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
                'id' => 29,
                'meal_id' => 16,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-11-28 13:20:10',
                'updated_at' => '2024-12-28 16:25:22',
                'price' => 0.3,
            ),
            1 => 
            array (
                'id' => 30,
                'meal_id' => 16,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-11-28 13:20:10',
                'updated_at' => '2024-12-28 08:04:36',
                'price' => 0.3,
            ),
            2 => 
            array (
                'id' => 49,
                'meal_id' => 15,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 18:55:10',
                'updated_at' => '2024-12-28 08:04:36',
                'price' => 0.4,
            ),
            3 => 
            array (
                'id' => 50,
                'meal_id' => 15,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 18:55:10',
                'updated_at' => '2024-12-28 08:04:36',
                'price' => 0.15,
            ),
            4 => 
            array (
                'id' => 54,
                'meal_id' => 17,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:11:28',
                'updated_at' => '2024-12-28 08:10:59',
                'price' => 1.5,
            ),
            5 => 
            array (
                'id' => 68,
                'meal_id' => 19,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:29:44',
                'updated_at' => '2024-12-28 08:10:59',
                'price' => 0.3,
            ),
            6 => 
            array (
                'id' => 69,
                'meal_id' => 19,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:29:44',
                'updated_at' => '2024-12-28 08:10:59',
                'price' => 0.4,
            ),
            7 => 
            array (
                'id' => 70,
                'meal_id' => 19,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:29:44',
                'updated_at' => '2024-12-28 08:10:59',
                'price' => 0.15,
            ),
            8 => 
            array (
                'id' => 74,
                'meal_id' => 20,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:32:24',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.2,
            ),
            9 => 
            array (
                'id' => 75,
                'meal_id' => 20,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:32:24',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.4,
            ),
            10 => 
            array (
                'id' => 76,
                'meal_id' => 20,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:32:24',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.1,
            ),
            11 => 
            array (
                'id' => 80,
                'meal_id' => 21,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:41:46',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.2,
            ),
            12 => 
            array (
                'id' => 81,
                'meal_id' => 21,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:41:47',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.3,
            ),
            13 => 
            array (
                'id' => 82,
                'meal_id' => 21,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:41:47',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.1,
            ),
            14 => 
            array (
                'id' => 86,
                'meal_id' => 18,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:42:56',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.2,
            ),
            15 => 
            array (
                'id' => 87,
                'meal_id' => 18,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:42:56',
                'updated_at' => '2024-12-28 16:02:25',
                'price' => 0.1,
            ),
            16 => 
            array (
                'id' => 92,
                'meal_id' => 22,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:43:36',
                'updated_at' => '2024-12-28 08:11:00',
                'price' => 0.5,
            ),
            17 => 
            array (
                'id' => 94,
                'meal_id' => 22,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:43:36',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.3,
            ),
            18 => 
            array (
                'id' => 99,
                'meal_id' => 23,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:47:30',
                'updated_at' => '2024-12-28 16:27:45',
                'price' => 4.0,
            ),
            19 => 
            array (
                'id' => 100,
                'meal_id' => 23,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:47:30',
                'updated_at' => '2024-12-28 16:27:49',
                'price' => 3.0,
            ),
            20 => 
            array (
                'id' => 110,
                'meal_id' => 24,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:49:49',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.1,
            ),
            21 => 
            array (
                'id' => 116,
                'meal_id' => 25,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:52:43',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.0,
            ),
            22 => 
            array (
                'id' => 117,
                'meal_id' => 25,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:52:43',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.3,
            ),
            23 => 
            array (
                'id' => 118,
                'meal_id' => 25,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:52:43',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.1,
            ),
            24 => 
            array (
                'id' => 122,
                'meal_id' => 26,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:55:02',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.0,
            ),
            25 => 
            array (
                'id' => 123,
                'meal_id' => 26,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:55:02',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.3,
            ),
            26 => 
            array (
                'id' => 124,
                'meal_id' => 26,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:55:02',
                'updated_at' => '2024-12-28 08:11:01',
                'price' => 0.1,
            ),
            27 => 
            array (
                'id' => 128,
                'meal_id' => 27,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:55:53',
                'updated_at' => '2024-12-28 16:24:45',
                'price' => 0.8,
            ),
            28 => 
            array (
                'id' => 129,
                'meal_id' => 27,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:55:53',
                'updated_at' => '2024-12-28 16:24:49',
                'price' => 0.4,
            ),
            29 => 
            array (
                'id' => 130,
                'meal_id' => 27,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:55:53',
                'updated_at' => '2024-12-28 16:24:52',
                'price' => 0.4,
            ),
            30 => 
            array (
                'id' => 134,
                'meal_id' => 28,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:58:51',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.5,
            ),
            31 => 
            array (
                'id' => 135,
                'meal_id' => 28,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:58:51',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.0,
            ),
            32 => 
            array (
                'id' => 136,
                'meal_id' => 28,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 19:58:51',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.0,
            ),
            33 => 
            array (
                'id' => 140,
                'meal_id' => 29,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:11:20',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.3,
            ),
            34 => 
            array (
                'id' => 146,
                'meal_id' => 30,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:13:03',
                'updated_at' => '2024-12-28 16:35:52',
                'price' => 0.7,
            ),
            35 => 
            array (
                'id' => 152,
                'meal_id' => 31,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:13:38',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.5,
            ),
            36 => 
            array (
                'id' => 158,
                'meal_id' => 32,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:14:23',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.3,
            ),
            37 => 
            array (
                'id' => 165,
                'meal_id' => 33,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:14:54',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.2,
            ),
            38 => 
            array (
                'id' => 166,
                'meal_id' => 33,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:14:54',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.1,
            ),
            39 => 
            array (
                'id' => 170,
                'meal_id' => 34,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:16:26',
                'updated_at' => '2024-12-28 08:11:02',
                'price' => 0.1,
            ),
            40 => 
            array (
                'id' => 176,
                'meal_id' => 12,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:17:25',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 0.2,
            ),
            41 => 
            array (
                'id' => 178,
                'meal_id' => 12,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:17:25',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 0.1,
            ),
            42 => 
            array (
                'id' => 182,
                'meal_id' => 37,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:18:38',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 1.0,
            ),
            43 => 
            array (
                'id' => 188,
                'meal_id' => 38,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:19:12',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 1.0,
            ),
            44 => 
            array (
                'id' => 206,
                'meal_id' => 39,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:37:16',
                'updated_at' => '2024-12-28 16:43:24',
                'price' => 0.4,
            ),
            45 => 
            array (
                'id' => 212,
                'meal_id' => 51,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:38:52',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 0.2,
            ),
            46 => 
            array (
                'id' => 213,
                'meal_id' => 51,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:38:52',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 0.4,
            ),
            47 => 
            array (
                'id' => 214,
                'meal_id' => 51,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:38:52',
                'updated_at' => '2024-12-28 08:11:03',
                'price' => 0.1,
            ),
            48 => 
            array (
                'id' => 218,
                'meal_id' => 42,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:40:37',
                'updated_at' => '2024-12-28 16:23:35',
                'price' => 0.4,
            ),
            49 => 
            array (
                'id' => 219,
                'meal_id' => 42,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:40:37',
                'updated_at' => '2024-12-28 16:23:19',
                'price' => 0.25,
            ),
            50 => 
            array (
                'id' => 220,
                'meal_id' => 42,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:40:37',
                'updated_at' => '2024-12-28 16:23:22',
                'price' => 0.2,
            ),
            51 => 
            array (
                'id' => 224,
                'meal_id' => 11,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:42:03',
                'updated_at' => '2024-12-28 08:11:04',
                'price' => 0.2,
            ),
            52 => 
            array (
                'id' => 225,
                'meal_id' => 11,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:42:03',
                'updated_at' => '2024-12-28 08:11:04',
                'price' => 0.4,
            ),
            53 => 
            array (
                'id' => 226,
                'meal_id' => 11,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:42:03',
                'updated_at' => '2024-12-28 08:11:04',
                'price' => 0.1,
            ),
            54 => 
            array (
                'id' => 231,
                'meal_id' => 9,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:43:25',
                'updated_at' => '2024-12-28 16:22:18',
                'price' => 0.4,
            ),
            55 => 
            array (
                'id' => 232,
                'meal_id' => 9,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:43:25',
                'updated_at' => '2024-12-28 16:22:21',
                'price' => 0.4,
            ),
            56 => 
            array (
                'id' => 236,
                'meal_id' => 5,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:45:15',
                'updated_at' => '2024-12-28 16:49:16',
                'price' => 0.2,
            ),
            57 => 
            array (
                'id' => 242,
                'meal_id' => 8,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:45:52',
                'updated_at' => '2024-12-28 08:11:04',
                'price' => 0.2,
            ),
            58 => 
            array (
                'id' => 243,
                'meal_id' => 8,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:45:52',
                'updated_at' => '2024-12-28 08:11:04',
                'price' => 0.4,
            ),
            59 => 
            array (
                'id' => 248,
                'meal_id' => 7,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:46:44',
                'updated_at' => '2024-12-28 08:11:04',
                'price' => 0.1,
            ),
            60 => 
            array (
                'id' => 254,
                'meal_id' => 48,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:47:16',
                'updated_at' => '2024-12-28 08:11:05',
                'price' => 0.2,
            ),
            61 => 
            array (
                'id' => 256,
                'meal_id' => 48,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:47:16',
                'updated_at' => '2024-12-28 08:11:05',
                'price' => 0.1,
            ),
            62 => 
            array (
                'id' => 261,
                'meal_id' => 49,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:48:03',
                'updated_at' => '2024-12-28 16:01:23',
                'price' => 0.3,
            ),
            63 => 
            array (
                'id' => 262,
                'meal_id' => 49,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:48:03',
                'updated_at' => '2024-12-28 08:11:05',
                'price' => 0.2,
            ),
            64 => 
            array (
                'id' => 272,
                'meal_id' => 2,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:49:34',
                'updated_at' => '2024-12-28 16:00:29',
                'price' => 0.3,
            ),
            65 => 
            array (
                'id' => 273,
                'meal_id' => 2,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:49:34',
                'updated_at' => '2024-12-28 15:41:47',
                'price' => 0.2,
            ),
            66 => 
            array (
                'id' => 274,
                'meal_id' => 2,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-05 20:49:34',
                'updated_at' => '2024-12-28 15:37:05',
                'price' => 0.3,
            ),
            67 => 
            array (
                'id' => 286,
                'meal_id' => 18,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 02:37:44',
                'updated_at' => '2024-12-28 08:11:05',
                'price' => 0.1,
            ),
            68 => 
            array (
                'id' => 287,
                'meal_id' => 2,
                'service_id' => 7,
                'quantity' => 1,
                'created_at' => '2024-12-28 15:40:52',
                'updated_at' => '2024-12-28 15:41:30',
                'price' => 0.3,
            ),
            69 => 
            array (
                'id' => 288,
                'meal_id' => 2,
                'service_id' => 8,
                'quantity' => 1,
                'created_at' => '2024-12-28 15:41:07',
                'updated_at' => '2024-12-28 15:41:34',
                'price' => 0.3,
            ),
            70 => 
            array (
                'id' => 289,
                'meal_id' => 2,
                'service_id' => 9,
                'quantity' => 1,
                'created_at' => '2024-12-28 15:41:15',
                'updated_at' => '2024-12-28 15:41:38',
                'price' => 0.5,
            ),
            71 => 
            array (
                'id' => 290,
                'meal_id' => 49,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:01:34',
                'updated_at' => '2024-12-28 16:01:45',
                'price' => 0.5,
            ),
            72 => 
            array (
                'id' => 291,
                'meal_id' => 48,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:03:25',
                'updated_at' => '2024-12-28 16:03:32',
                'price' => 0.1,
            ),
            73 => 
            array (
                'id' => 292,
                'meal_id' => 7,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:03:58',
                'updated_at' => '2024-12-28 16:04:22',
                'price' => 0.05,
            ),
            74 => 
            array (
                'id' => 293,
                'meal_id' => 7,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:04:02',
                'updated_at' => '2024-12-28 16:04:24',
                'price' => 0.05,
            ),
            75 => 
            array (
                'id' => 294,
                'meal_id' => 52,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:21:10',
                'updated_at' => '2024-12-28 16:22:38',
                'price' => 0.5,
            ),
            76 => 
            array (
                'id' => 295,
                'meal_id' => 52,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:21:19',
                'updated_at' => '2024-12-28 16:22:41',
                'price' => 0.5,
            ),
            77 => 
            array (
                'id' => 296,
                'meal_id' => 52,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:21:22',
                'updated_at' => '2024-12-28 16:22:43',
                'price' => 1.0,
            ),
            78 => 
            array (
                'id' => 297,
                'meal_id' => 9,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:22:22',
                'updated_at' => '2024-12-28 16:22:26',
                'price' => 0.8,
            ),
            79 => 
            array (
                'id' => 298,
                'meal_id' => 16,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:25:24',
                'updated_at' => '2024-12-28 16:25:33',
                'price' => 0.6,
            ),
            80 => 
            array (
                'id' => 299,
                'meal_id' => 17,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:26:02',
                'updated_at' => '2024-12-28 16:26:18',
                'price' => 1.5,
            ),
            81 => 
            array (
                'id' => 300,
                'meal_id' => 17,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:26:05',
                'updated_at' => '2024-12-28 16:26:12',
                'price' => 3.0,
            ),
            82 => 
            array (
                'id' => 301,
                'meal_id' => 23,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:27:37',
                'updated_at' => '2024-12-28 16:27:51',
                'price' => 7.0,
            ),
            83 => 
            array (
                'id' => 302,
                'meal_id' => 53,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:29:44',
                'updated_at' => '2024-12-28 16:29:56',
                'price' => 0.6,
            ),
            84 => 
            array (
                'id' => 303,
                'meal_id' => 53,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:29:47',
                'updated_at' => '2024-12-28 16:29:59',
                'price' => 0.3,
            ),
            85 => 
            array (
                'id' => 304,
                'meal_id' => 53,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:29:51',
                'updated_at' => '2024-12-28 16:30:02',
                'price' => 0.3,
            ),
            86 => 
            array (
                'id' => 305,
                'meal_id' => 55,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:31:19',
                'updated_at' => '2024-12-28 16:31:36',
                'price' => 0.15,
            ),
            87 => 
            array (
                'id' => 306,
                'meal_id' => 55,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:31:22',
                'updated_at' => '2024-12-28 16:31:40',
                'price' => 0.15,
            ),
            88 => 
            array (
                'id' => 307,
                'meal_id' => 55,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:31:26',
                'updated_at' => '2024-12-28 16:31:44',
                'price' => 0.3,
            ),
            89 => 
            array (
                'id' => 308,
                'meal_id' => 56,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:32:12',
                'updated_at' => '2024-12-28 16:34:47',
                'price' => 0.3,
            ),
            90 => 
            array (
                'id' => 309,
                'meal_id' => 56,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:32:15',
                'updated_at' => '2024-12-28 16:34:50',
                'price' => 0.3,
            ),
            91 => 
            array (
                'id' => 310,
                'meal_id' => 56,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:32:19',
                'updated_at' => '2024-12-28 16:34:53',
                'price' => 0.6,
            ),
            92 => 
            array (
                'id' => 311,
                'meal_id' => 39,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:38:56',
                'updated_at' => '2024-12-28 16:40:59',
                'price' => 0.2,
            ),
            93 => 
            array (
                'id' => 312,
                'meal_id' => 39,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:39:01',
                'updated_at' => '2024-12-28 16:41:03',
                'price' => 0.2,
            ),
            94 => 
            array (
                'id' => 313,
                'meal_id' => 32,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:44:05',
                'updated_at' => '2024-12-28 16:44:20',
                'price' => 0.15,
            ),
            95 => 
            array (
                'id' => 314,
                'meal_id' => 32,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:44:08',
                'updated_at' => '2024-12-28 16:44:24',
                'price' => 0.15,
            ),
            96 => 
            array (
                'id' => 315,
                'meal_id' => 31,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:44:40',
                'updated_at' => '2024-12-28 16:44:51',
                'price' => 0.25,
            ),
            97 => 
            array (
                'id' => 316,
                'meal_id' => 31,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:44:44',
                'updated_at' => '2024-12-28 16:44:53',
                'price' => 0.25,
            ),
            98 => 
            array (
                'id' => 317,
                'meal_id' => 58,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:45:46',
                'updated_at' => '2024-12-28 16:46:07',
                'price' => 0.15,
            ),
            99 => 
            array (
                'id' => 318,
                'meal_id' => 58,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:45:50',
                'updated_at' => '2024-12-28 16:46:11',
                'price' => 0.15,
            ),
            100 => 
            array (
                'id' => 319,
                'meal_id' => 58,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:45:53',
                'updated_at' => '2024-12-28 16:46:15',
                'price' => 0.3,
            ),
            101 => 
            array (
                'id' => 320,
                'meal_id' => 57,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:46:23',
                'updated_at' => '2024-12-28 16:46:48',
                'price' => 0.1,
            ),
            102 => 
            array (
                'id' => 321,
                'meal_id' => 57,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:46:27',
                'updated_at' => '2024-12-28 16:46:50',
                'price' => 0.1,
            ),
            103 => 
            array (
                'id' => 322,
                'meal_id' => 57,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:46:33',
                'updated_at' => '2024-12-28 16:46:52',
                'price' => 0.2,
            ),
            104 => 
            array (
                'id' => 323,
                'meal_id' => 60,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:47:37',
                'updated_at' => '2024-12-28 16:48:00',
                'price' => 1.0,
            ),
            105 => 
            array (
                'id' => 324,
                'meal_id' => 60,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:47:43',
                'updated_at' => '2024-12-28 16:48:05',
                'price' => 0.5,
            ),
            106 => 
            array (
                'id' => 325,
                'meal_id' => 60,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:47:51',
                'updated_at' => '2024-12-28 16:48:08',
                'price' => 1.5,
            ),
            107 => 
            array (
                'id' => 326,
                'meal_id' => 59,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:48:14',
                'updated_at' => '2024-12-28 16:48:33',
                'price' => 0.5,
            ),
            108 => 
            array (
                'id' => 327,
                'meal_id' => 59,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:48:17',
                'updated_at' => '2024-12-28 16:48:36',
                'price' => 0.5,
            ),
            109 => 
            array (
                'id' => 328,
                'meal_id' => 59,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:48:21',
                'updated_at' => '2024-12-28 16:48:38',
                'price' => 1.0,
            ),
            110 => 
            array (
                'id' => 329,
                'meal_id' => 5,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:49:06',
                'updated_at' => '2024-12-28 16:49:17',
                'price' => 0.1,
            ),
            111 => 
            array (
                'id' => 330,
                'meal_id' => 5,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:49:09',
                'updated_at' => '2024-12-28 16:49:20',
                'price' => 0.1,
            ),
            112 => 
            array (
                'id' => 331,
                'meal_id' => 61,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:49:49',
                'updated_at' => '2024-12-28 16:50:13',
                'price' => 0.15,
            ),
            113 => 
            array (
                'id' => 332,
                'meal_id' => 61,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:49:53',
                'updated_at' => '2024-12-28 16:50:16',
                'price' => 0.15,
            ),
            114 => 
            array (
                'id' => 333,
                'meal_id' => 61,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:49:58',
                'updated_at' => '2024-12-28 16:50:20',
                'price' => 0.3,
            ),
            115 => 
            array (
                'id' => 334,
                'meal_id' => 62,
                'service_id' => 4,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:50:47',
                'updated_at' => '2024-12-28 16:51:01',
                'price' => 0.15,
            ),
            116 => 
            array (
                'id' => 335,
                'meal_id' => 62,
                'service_id' => 5,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:50:51',
                'updated_at' => '2024-12-28 16:51:04',
                'price' => 0.15,
            ),
            117 => 
            array (
                'id' => 336,
                'meal_id' => 62,
                'service_id' => 3,
                'quantity' => 1,
                'created_at' => '2024-12-28 16:50:55',
                'updated_at' => '2024-12-28 16:51:07',
                'price' => 0.3,
            ),
        ));
        
        
    }
}