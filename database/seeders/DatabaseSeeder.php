<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Audience;
use App\Models\CategoryCourse;
use App\Models\CategoryPost;
use App\Models\Course;
use App\Models\Description;
use App\Models\Exam;
use App\Models\Goal;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Meeting;
use App\Models\Platform;
use App\Models\Prize;
use App\Models\Profile;
use App\Models\Qualification;
use App\Models\Question;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $this->deleteDirectories([
            'courses',
            'posts',
        ]);
        $this->makeDirectories([
            'courses',
            'posts',
        ]);
        $this->truncate([
            User::$tabla,
            Profile::$tabla,
            CategoryPost::$tabla,
            Tag::$tabla,
            Level::$tabla,
            CategoryCourse::$tabla,
            Prize::$tabla,
            Goal::$tabla,
            Requirement::$tabla,
            Audience::$tabla,
            Review::$tabla,
            Qualification::$tabla,
            'course_user',
            Section::$tabla,
            Platform::$tabla,
            Lesson::$tabla,
            'lesson_user',
            Description::$tabla,
            Video::$tabla,
            Meeting::$tabla,
            Exam::$tabla,
            Question::$tabla,
            Answer::$tabla,
            'question_answer'
        ]);
        $this->call(UserSeeder::class);
        $this->call(CategoryPostSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategoryCourseSeeder::class);
        $this->call(PrizeSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
    }

    public function makeDirectories(array $directories)
    {
        foreach ($directories as $directory){
            Storage::makeDirectory($directory);
        }

    }
    public function deleteDirectories(array $directories)
    {
        foreach ($directories as $directory){
            Storage::deleteDirectory($directory);
        }
    }
    public function truncate(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
