<?php

namespace Database\Seeders;

use Database\Seeders\CategorySeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\PlatformSeeder;
use Database\Seeders\PriceSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // crear y borrar directorio de las img de courses
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');

        // Ingresar los seeder de los que dependen otras tablas primero
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);

        $this->call(CourseSeeder::class);

    }
}
