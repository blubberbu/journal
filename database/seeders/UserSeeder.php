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
        $names = ['Admin', 'Joe'];
        $emails = ['admin@example.com', 'joe@example.com'];
        $passwords = [bcrypt('test'), bcrypt('1234')];
        $roles = ['admin', 'member'];
        $genders = ['Male', 'Male'];
        $addresses = ['123 Street', 'Joe Street'];

        for ($i = 0; $i < count($names); $i++) {
            User::create([
                'name' => $names[$i],
                'email' => $emails[$i],
                'password' => $passwords[$i],
                'role' => $roles[$i],
                'gender' => $genders[$i],
                'address' => $addresses[$i]
            ]);
        }
    }
}
