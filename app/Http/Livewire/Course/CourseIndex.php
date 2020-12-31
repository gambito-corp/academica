<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\CategoryCourse as Category;
use App\Models\Level;
use App\Models\Prize;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use withPagination;

    public $category_id;
    public $level_id;
    public $prize_id;

    public function render()
    {
        $courses = Course::where('status', Course::PUBLICADO)
            ->category($this->category_id)
            ->level($this->level_id)
            ->prize($this->prize_id)
            ->latest('id')
            ->paginate(8);
        $categories = Category::all();
        $levels = Level::all();
        $prizes = Prize::all();

        return view('livewire.course.course-index', compact('courses', 'categories', 'levels', 'prizes'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id', 'prize_id']);
        $this->category_id;
        $this->level_id;
        $this->prize_id;
    }
}
