<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        date_default_timezone_set("Asia/Jakarta");
        \DB::table("users")->insert([
            "name" => "Prihanto",
            "email" => "prihanto@gmail.com",
            "password" => bcrypt("rahasia"),
            "created_at" => new \Datetime,
            "updated_at" => NULL
        ]);
    }
}
