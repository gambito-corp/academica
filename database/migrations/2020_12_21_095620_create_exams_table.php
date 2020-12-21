<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->timestamp('started_at');
            $table->timestamp('finaliced_at');
            $table->string('duration');
            $table->string('attempts');
            $table->string('min');
            $table->string('max');
            $table->boolean('random');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
