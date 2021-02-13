<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'fname' => 'ภานรินทร์',
            'lname' => 'อิ่นแก้ว',
            'prefix_id' => 3,
            'email' => 'student@gmail.com',
            'username' => 'student',
            'password' => Hash::make('123456'),
            'type' => 0
        ]);

        DB::table('users')->insert([
            'fname' => 'พุธิตา',
            'lname' => 'เจือจันทร์',
            'prefix_id' => 3,
            'email' => 'student2@gmail.com',
            'username' => 'student2',
            'password' => Hash::make('123456'),
            'type' => 0
        ]);

        DB::table('users')->insert([
            'fname' => 'วิชุดา',
            'lname' => 'ไชยศิวามงคล',
            'prefix_id' => 3,
            'email' => 'teacher@gmail.com',
            'username' => 'teacher',
            'password' => Hash::make('123456'),
            'type' => 1
        ]);

        DB::table('users')->insert([
            'fname' => 'Admin',
            'lname' => 'Admin',
            'prefix_id' => 1,
            'email' => 'admin@gmail.com',
            'username' => 'adminadmin',
            'password' => Hash::make('123456'),
            'type' => 2
        ]);
    }
}