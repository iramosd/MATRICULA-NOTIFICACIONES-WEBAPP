<?php

namespace App\Livewire\Enrollment\Form;

use App\Services\CourseService;
use Livewire\Component;

class NewEnrollment extends Component
{

    private CourseService $courseService;

    //course data
    public $courseId = '';
    public $courseName = null;
    public $courseDescription = '';    
    public $courseCost = '';
    public $courseDuration = '';  
    public $academyName = '';  
    public $courseList = null;

    public function __construct()
    {
        $this->courseService = new CourseService(); 
    }
    
    public function mount($course)
    {
        if(isset($course)){
            $this->courseId = $course->id;
            $this->courseName = $course->name;
            $this->courseDescription = $course->description;
            $this->courseCost = $course->cost;
            $this->courseDuration = $course->duration;
            $this->academyName = $course->academy->name;
        } 
        
        $this->courseList = $this->courseService->listByColumns(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.enrollment.form.new-enrollment');
    }

    public function onCourseSelected()
    {
        $selectedCourse = $this->courseService->show($this->courseId);

        $this->courseId = $selectedCourse->id;
        $this->courseName = $selectedCourse->name;
        $this->courseDescription = $selectedCourse->description;
        $this->courseCost = $selectedCourse->cost;
        $this->courseDuration = $selectedCourse->duration;
        $this->academyName = $selectedCourse->academy->name;
    }

}
