<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('category_course_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('level_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('prize_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->string('description')->nullable();
            $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO, Course::BLOQUEADO])->default(Course::BORRADOR);
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
}
