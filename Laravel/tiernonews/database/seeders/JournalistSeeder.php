<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class JournalistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('journalists') -> insert([
            "name" => "Luz",
            "surname" => "Luna",
            "email" => "luz@gmail.com",
            "password" => "",
        ]);

        for ($i=0; $i < 5; $i++) { 
            DB::table('journalists') -> insert([
            "name" => "journalist$i",
            "surname" => "surname$i",
            "email" => "email$i",
            "password" => "",
        ]);
        }
    }
}
