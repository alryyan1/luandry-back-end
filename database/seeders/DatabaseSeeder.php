<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['name'=>'roony', 'username'=>'admin-del','password'=>bcrypt('12345678')]);
        Customer::create(['name'=>'default','phone'=>'','address'=>'','area'=>'','state'=>'']);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MealsTableSeeder::class);
        $this->call(ChildMealsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
    }
}
