<?php

namespace Database\Seeders;

use App\Models\CategoryCourse;
use App\Models\CategoryPost;
use App\Models\Course;
use App\Models\Level;
use App\Models\Prize;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
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
        ]);
        $this->call(UserSeeder::class);
        $this->call(CategoryPostSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategoryCourseSeeder::class);
        $this->call(PrizeSeeder::class);
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
