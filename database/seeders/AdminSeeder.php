<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $admin = Admin::create([
            'name' => $faker->name,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);
    }
}
