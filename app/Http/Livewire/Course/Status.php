<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class Status extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }
    public function render()
    {
        return view('livewire.course.status');
    }
}
