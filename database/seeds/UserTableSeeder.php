<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@upmountaineers.org',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'first_name' => 'jm',
            'last_name' => 'ramos',
            'contact_number' => '09054013855',
        ]);
    }
}
