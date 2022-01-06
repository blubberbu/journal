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
        // dummy data
        User::create([
            'name' => 'Joe',
            'email' => 'joe@email.com',
            'password' => bcrypt('test'),
            'role' => 'member'
        ]);
    }
}
