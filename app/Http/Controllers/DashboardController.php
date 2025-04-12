<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $coursesPaginated = (new CourseService)->list(with: ['academy']);

        return view('dashboard');
    }
}
