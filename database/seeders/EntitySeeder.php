<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entities')->insert([
            [
                'name' => 'Task'
            ],
            [
                'name' => 'User'
            ],
            [
                'name' => 'Category'
            ],
        ]);
    }
}
