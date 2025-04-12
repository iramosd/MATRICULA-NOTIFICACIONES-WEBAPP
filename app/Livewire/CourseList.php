<?php

namespace App\Livewire;

use App\Services\CourseService;
use Livewire\Component;
use Livewire\WithPagination;

class CourseList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.course-list', [
            'courses' => (new CourseService)->list(with: ['academy']),
        ]);
    }
}
