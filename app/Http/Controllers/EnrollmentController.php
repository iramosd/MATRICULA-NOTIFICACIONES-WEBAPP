<?php

namespace App\Http\Controllers;

use App\Enum\EnrollmentStatusEnum;
use App\Http\Requests\EnrollmentFormRequest;
use App\Models\Enrollment;
use App\Services\CourseService;
use App\Services\EnrollmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EnrollmentController extends Controller
{
    public function __construct(
        private readonly EnrollmentService $service
    )
    { 
    }

    public function create(Request $request)
    {
        $course = null;

        if($request->has('course_id')){
            $course = (new CourseService)->show($request->get('course_id'));
        }

        return view('enrollment', [
            'course' => $course,
            'guardian' => auth('guardian')->user()?->load(['students']),
        ]);
    }

    public function store(Request $request)
    {
        try{
            $inputs = $request->all();
        
            $successEnrollment = $this->service->enrollStudent( 
                $inputs['course_id'], 
                [
                    'first_name' => $inputs['first_name'],
                    'last_name' => $inputs['last_name'],
                    'birth_date' => $inputs['birth_date'],
                    'guardian_id' =>  auth('guardian')?->user()->id,
                ]
            );
            
            return ($successEnrollment instanceof Enrollment)
                ? redirect()->route('dashboard')->with('success', 'Su hijo fue matriculado con éxito.')
                : back()->with('error', 'Ocurrió un error al realizar la matrícula, por favor intentelo de nuevo.');
        } catch (\Throwable $error){
            Log::error($error);
            return back()->with('error', 'Ocurrió un error al realizar la matrícula, por favor intentelo de nuevo.');
        }
        
    
    }
}
