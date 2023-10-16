<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TecnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $tecnologyList = ["Html", "Css", "Sass", "JS", "Vue", "React", "Angular", "PHP", "Laravel", "Boostrap", "Tailwind"];

        foreach($tecnologyList as $tecnology) {
            $new_type = new Tecnology();

            $new_type->name = $tecnology;
            $new_type->description = $faker->text(40);
            $new_type->color = $faker->rgbColor();

            $new_type->save();
        }
    }
}
