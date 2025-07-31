<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Data::create([
            "ip" => "172.20.149.65",
            "name" => "Daniel Ramirez",
            "phone" => "9180346014",
            "email" => "gregory8590@evans.net",
            "status" => "inquiries",
            "user_id" => 1,
        ]);
    }
}
