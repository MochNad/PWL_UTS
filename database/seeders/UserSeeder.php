<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'fiki',
                'name' => 'fiki',
                'email' => 'fiki@asd.com',
                'password' => Hash::make('1234')
            ],
            [
                'username' => 'nadi',
                'name' => 'nadi',
                'email' => 'nadi@asd.com',
                'password' => Hash::make('1234')
            ]
            ]);
    }
}
