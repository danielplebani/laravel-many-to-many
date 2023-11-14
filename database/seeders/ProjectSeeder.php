<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 12; $i++) { 
            $project = new Project();
            $project->name = $faker->realText(50);
            $project->link_github = $faker->url;
            $project->link_website = $faker->url;
            $project->content = $faker->realText();
            $project->cover_image = $faker->imageUrl(600, 400, format: 'jpg');
            $project->save();
        }
    }
}
