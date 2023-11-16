<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array([
            'name'  => 'Hasan',
            'email' => 'Has@gmail.com',
            'password' => bcrypt('476547'),
            'role' => 'admin',


        ],
        [
            'name'  => 'tokyo',
            'email' => 'tok@gmail.com',
            'password' => bcrypt('476547'),
            'role' => 'admin',
            

        ]));

    }
}
