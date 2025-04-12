<?php

namespace App\Livewire\Enrollment\Form;

use App\Services\CourseService;
use App\Services\EnrollmentService;
use Carbon\Carbon;
use Livewire\Component;

class NewEnrollment extends Component
{

    private CourseService $courseService;
    private EnrollmentService $enrollmentService;

    //course data
    public $courseId = '';
    public $courseName = null;
    public $courseDescription = '';    
    public $courseCost = '';
    public $courseDuration = '';  
    public $academyName = '';  
    public $courseList = null;

    //student data
    public $firstName = '';
    public $lastName = '';  
    public $dateOfBirth = '';

    public function __construct()
    {
        $this->courseService = new CourseService(); 
        $this->enrollmentService = new EnrollmentService(); 

    }
    
    public function mount($course)
    {
        $this->dateOfBirth = Carbon::now()->format('Y-m-d');

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

    public function enroll()
    {
        $this->enrollmentService->enrollStudent( 
            $this->courseId, 
            [
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'birth_date' => $this->dateOfBirth,
                'guardian_id' =>  auth('guardian')?->user()->id,
            ]
        );
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
