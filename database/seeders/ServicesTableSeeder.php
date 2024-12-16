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
                'name' => 'سمبوسه مكس الاجبان',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'سمبوسة شاورمادجاج',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'سمبوسة جبن مثلثات',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'تشــباتي',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'كرســبي ســـانــدويش دجاج',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'بيتزادجــاج بالصـوص الخاص',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '500 جــــرام شـــــاورمــادجـــــاج',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '500 جرام صدور تنــدوري دجاج',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'بيتزا نقانق دجاج',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'سبرنج رول دجاج',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'ساندويش كرسبي دجاج',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '3 كيلو جرام شاورمادجاج',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '3 كيلو جرام تندوري دجاج',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'دجاج بالتتبيلة الخاصة',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'دجاج بصوص التندوري',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'دجاج بالتتبيلة الهندية',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'صلصة دل باستا الحمراء',
            ),
        ));
        
        
    }
}