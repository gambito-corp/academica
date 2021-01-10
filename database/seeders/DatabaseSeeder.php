<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Audience;
use App\Models\CategoryCourse;
use App\Models\CategoryPost;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Description;
use App\Models\Exam;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Meeting;
use App\Models\Note;
use App\Models\Platform;
use App\Models\Post;
use App\Models\Prize;
use App\Models\Profile;
use App\Models\Qualification;
use App\Models\Question;
use App\Models\Reaction;
use App\Models\Requirement;
use App\Models\Resource;
use App\Models\Review;
use App\Models\Section;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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

        $this->erase([
            'post_tag',
            'course_user',
            'lesson_user',
            'question_answer',
        ]);
        $this->truncateTable([
            User::class,
            Profile::class,
            CategoryPost::class,
            Tag::class,
            Post::class,
            Course::class,
            Level::class,
            CategoryCourse::class,
            Prize::class,
            Goal::class,
            Requirement::class,
            Audience::class,
            Review::class,
            Qualification::class,
            Section::class,
            Platform::class,
            Lesson::class,
            Description::class,
            Video::class,
            Meeting::class,
            Exam::class,
            Question::class,
            Answer::class,
            Comment::class,
            Image::class,
            Note::class,
            Reaction::class,
            Resource::class
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
        $this->call(ImageSeeder::class);
    }

    protected function truncateTable($models): void
    {
        Schema::disableForeignKeyConstraints();
        foreach ($models as $model)
        {
            $model::truncate();
        }
        Schema::enableForeignKeyConstraints();
    }

    public function erase(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
