<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            
        
        // DB::table('tasks')->insert([
        //     [
        //         'name' => 'validacao dos documentos',
        //         'category' => 'Back Office',
        //         'priority' => 'Alta',
        //         'when' => Carbon::now()->addMinutes(rand(60, 180))
        //     ],
        //     [
        //         'name' => 'Verificacao dos curriculos de contratacao',
        //         'category' => 'Back Office',
        //         'priority' => 'Alta',
        //         'when' => Carbon::now()->addMinutes(rand(60, 180))
        //     ],
        //     [
        //         'name' => 'Anunciar vagas no linkedim',
        //         'category' => 'Back Office',
        //         'priority' => 'Alta',
        //         'when' => Carbon::now()->addMinutes(rand(60, 180))
        //     ],
        // ]);
    }
}
