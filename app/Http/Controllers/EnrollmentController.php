<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
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
}
