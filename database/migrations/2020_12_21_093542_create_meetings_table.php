<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->timestamp('started_at')->default(now());
            $table->timestamp('finaliced_at')->nullable();
            $table->string('duration');
            $table->string('password');
            $table->string('codigo');
            $table->string('url');
            $table->boolean('free')->default(0);
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
        Schema::dropIfExists('meetings');
    }
}
