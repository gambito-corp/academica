<?php

namespace Database\Seeders;

use App\Models\CategoryPost;
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
//        $this->deleteDirectories([
//            'courses',
//            'posts',
//        ]);
//        $this->makeDirectories([
//            'courses',
//            'posts',
//        ]);
//        $this->truncate([
//            User::$tabla,
//            Profile::$tabla,
//            CategoryPost::$tabla,
//            Tag::$tabla,
//        ]);
//        $this->call(UserSeeders::class);
        $this->call(UserSeeder::class);
        $this->call(CategoryPostSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
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
