<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status', [Course::DRAFT, Course::REVISION, Course::PUBLISHED])->default(Course::DRAFT);
            $table->string('slug');

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('level_id')->nullable()->constrained('levels')->onDelete('set null');
            $table->foreignId('price_id')->nullable()->constrained('prices')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
