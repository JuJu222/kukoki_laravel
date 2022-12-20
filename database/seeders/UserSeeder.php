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
            'full_name' => 'Achmad Rijalu 1',
            'email' => 'jalu@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '081231149830',
            'city' => 'Surabaya',
            'ward' => 'Kecamatan',
            'district' => 'Ketintang',
            'province' => 'Jawa Timur',
            'address' => 'Jl Gayungsari Timur',
            'profile_picture' => 'null',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'full_name' => 'Achmad Rijalu 2',
            'email' => 'jalu2@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '081231149830',
            'city' => 'Surabaya',
            'ward' => 'Kecamatan',
            'district' => 'Ketintang',
            'province' => 'Jawa Timur',
            'address' => 'Jl Gayungsari Timur',
            'profile_picture' => 'null',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'full_name' => 'Achmad Rijalu 3',
            'email' => 'jalu3@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '081231149830',
            'city' => 'Surabaya',
            'ward' => 'Kecamatan',
            'district' => 'Ketintang',
            'province' => 'Jawa Timur',
            'address' => 'Jl Gayungsari Timur',
            'profile_picture' => 'null',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
