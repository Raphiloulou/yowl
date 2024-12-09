<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'All', 'description' => 'Home'],
            ['name' => 'Séries et films', 'description' => 'Discussions sur les séries du moments!'],
            ['name' => 'Politique', 'description' => 'Échanges sur la politique.'],
            ['name' => 'Art', 'description' => 'Montrez vos créations aux grands publiques!'],
            ['name' => 'Sport', 'description' => 'Discussions sur l’actualité sportives.'],
            ['name' => 'Musique', 'description' => 'Echangez sur les nouveautés de la musique!'],
        ];
        foreach ($categories as $category) {
            DB::table("categories")->insert($category);
        }
    }
}
