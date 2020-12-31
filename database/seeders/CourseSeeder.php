<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Exam;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Meeting;
use App\Models\Qualification;
use App\Models\Question;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(50)->create();
        foreach ($courses as $course){
//            Storage::makeDirectory('courses');
//            $imagen = Image::factory()->Direccion([
//                'carpeta' => 'courses',
//                'ancho' => '640',
//                'alto' => '480'
//            ])->create([
//                'imageable_id' => $course->id,
//                'imageable_type' => Course::class,
//            ]);
//            $contents = Storage::disk('Courses')->get($imagen->url);
//            Storage::disk('s3')->put('courses/'.$imagen->url, $contents);
//            Storage::deleteDirectory('courses');
            Goal::factory(4)->create([
                'course_id' => $course->id
            ]);
            Requirement::factory(4)->create([
                'course_id' => $course->id
            ]);
            Audience::factory(4)->create([
                'course_id' => $course->id
            ]);
            Qualification::factory(4)->create([
                'user_id' => User::all()->random()->id,
                'course_id' => $course->id
            ]);
            Review::factory(4)->create([
                'user_id' => User::all()->random()->id,
                'course_id' => $course->id
            ]);
            $sections = Section::factory(4)->create([
                'course_id' => $course->id
            ]);
            foreach ($sections as $section){

                $collection = collect(['Video', 'Meeting', 'Exam']);

                $type = $collection->random();

                $free = false;

                if($type == 'Video'||$type == 'Meeting'){
                    $collection = collect([false, true]);
                    $free = $collection->random();
                }

                $lessons = Lesson::factory(4)->create([
                    'section_id' => $section->id,
                    'type' => $type,
                    'free' => $free
                ]);

                foreach ($lessons as $lesson){
                    $rand = rand(1,3);
                    Description::factory()->create([
                        'lesson_id' => $lesson->id
                    ]);
                    if ($lesson->type == 'Video'){
                        Video::factory()->create([
                            'lesson_id' => $lesson->id,
                        ]);
                    }
                    if ($lesson->type == 'Meeting'){
                        Meeting::factory()->create([
                            'lesson_id' => $lesson->id,
                        ]);
                    }
                    if ($lesson->type == 'Exam'){
                        $exam = Exam::factory()->create([
                            'lesson_id' => $lesson->id,
                        ]);
                        $questions = Question::factory(20)->create([
                            'exam_id' => $exam->id,
                        ]);
                        foreach ($questions as $question){
                            $aleatorio = rand(2,4);
                            Answer::factory($aleatorio)->create();
                        }
                    }
                }
            }
        }
    }
}
