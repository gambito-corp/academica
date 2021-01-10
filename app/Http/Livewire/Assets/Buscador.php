<?php

namespace App\Http\Livewire\Assets;

use App\Models\Course;
use Livewire\Component;

class Buscador extends Component
{
    public $search;


    public function render()
    {
        return view('livewire.assets.buscador');
    }

    public function getResultsProperty()
    {
        return Course::where('title', 'LIKE', '%'.$this->search.'%')
            ->where('status', Course::PUBLICADO)
            ->take(8)
            ->get();
    }
}
