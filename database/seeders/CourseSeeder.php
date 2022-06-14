<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(100)->create();

        foreach ($courses as $course) {

            // recorremos los cursos creados e iteramos el campo id en el modelo Image
            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => 'App\Models\Image',
            ]);

            // recorremos los cursos creados e iteramos el campo id en el modelo Requirement
            Requirement::factory(4)->create([
                'course_id' => $course->id,
            ]);

            // recorremos los cursos creados e iteramos el campo id en el modelo Audience
            Audience::factory(4)->create([
                'course_id' => $course->id,
            ]);

            // recorremos los cursos creados e iteramos el campo id en el modelo Goal
            Goal::factory(4)->create([
                'course_id' => $course->id,
            ]);

            // recorremos los cursos creados e iteramos el campo id en el modelo Section
            // lo incluimos en una variable para luego iterar y crear el id de section de la tabla lessons
            $sections = Section::factory(4)->create([
                'course_id' => $course->id,
            ]);

            // crear el id de section de la tabla lessons
            // guardamos el factory en una variable para iterar y crear el id de lessons
            foreach ($sections as $section) {
                $lessons = Lesson::factory(4)->create([
                    'section_id' => $section->id,
                ]);

                foreach ($lessons as $lesson) {
                    Description::factory(1)->create([
                        'lesson_id' => $lesson->id,
                    ]);

                }

            }

        }

    }
}
