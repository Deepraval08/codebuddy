<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin@123'),
            'is_admin' => 1,
        ]);

        User::updateOrCreate([
            'email' => 'raj123@gmail.com',
        ], [
            'name' => 'raj',
            'password' => bcrypt('raj1234@'),
        ]);
    }
}
