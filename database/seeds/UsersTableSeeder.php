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

        App\User::create([
            'name' => 'Sheldon Cooper',
            'email' => 'sheldoncooper@gmail.com',
            'password' => '$2y$10$o9WW4dOfPJm/tduzPV5vL.aOe7yxZm/p8vPkuhIk/Ob69L9.g8bwi' // Lunes1234
        ]);

        App\User::create([
            'name' => 'Yguanira',
            'email' => 'yguanira@gmail.com',
            'password' => '$2y$10$o9WW4dOfPJm/tduzPV5vL.aOe7yxZm/p8vPkuhIk/Ob69L9.g8bwi' // Lunes1234
        ]);

        App\User::create([
            'name' => 'Caterina',
            'email' => 'caterina@gmail.com',
            'password' => '$2y$10$o9WW4dOfPJm/tduzPV5vL.aOe7yxZm/p8vPkuhIk/Ob69L9.g8bwi' // Lunes1234
        ]);

        App\User::create([
            'name' => 'Cristina',
            'email' => 'cristina@gmail.com',
            'password' => '$2y$10$o9WW4dOfPJm/tduzPV5vL.aOe7yxZm/p8vPkuhIk/Ob69L9.g8bwi' // Lunes1234
        ]);
    }
}
