<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /***
         * $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
         * 
         */

        $admin = Admin::create(
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456'),
            ]
        );
    }
}
