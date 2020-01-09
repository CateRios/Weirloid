<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'email' => 'admin',
            'password' => '$2y$10$d.1LLbO9m2wG8tM1PGgRdusEbjCwm3299PuezN33S/R9hq4AgXoKm' // admin
        ]);
    }
}
