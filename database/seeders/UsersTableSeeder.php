<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Bob',
            'email'=> 'Bob@gmail.com',
            'password'=> bcrypt('12345678'),
            'address'=>'Griffith University',
            'role'=>'admin',
        ]);
        DB::table('users')->insert([
            'name'=>'Hungry Jacks',
            'email'=> 'hungryjacks@gmail.com',
            'password'=> bcrypt('12345678'),
            'address'=>'Labrador',
            'role'=>'Restaurant',
        ]);
        DB::table('users')->insert([
            'name'=>'McDonalds',
            'email'=> 'macca@gmail.com',
            'password'=> bcrypt('12345678'),
            'address'=>'Labrador',
            'role'=>'Restaurant',
        ]);
        DB::table('users')->insert([
            'name'=>'Dominos',
            'email'=> 'dominos@gmail.com',
            'password'=> bcrypt('12345678'),
            'address'=>'Labrador',
            'role'=>'Restaurant',
        ]);
        DB::table('users')->insert([
            'name'=>'PizzaHut',
            'email'=> 'pizzahut@gmail.com',
            'password'=> bcrypt('12345678'),
            'address'=>'Labrador',
            'role'=>'Restaurant',
        ]);
        DB::table('users')->insert([
            'name'=>'Dhwanil',
            'email'=> 'dj@gmail.com',
            'password'=> bcrypt('12345678'),
            'address'=>'Labrador',
            'role'=>'Customer',
        ]);
    }
}
