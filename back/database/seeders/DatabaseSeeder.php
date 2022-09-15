<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'phanith',
            'last_name' => 'chhim',
            'gender' => 'Male',
            'email' => 'phanith@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'coordinator',
        ]);
    }
}
