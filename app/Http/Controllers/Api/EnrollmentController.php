<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollmentRequest;
use App\Http\Resources\EnrollmentResource;
use App\Models\Enrollment;
use App\Services\EnrollmentService;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct(
        private readonly EnrollmentService $service
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EnrollmentResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnrollmentRequest $request)
    {
        return new EnrollmentResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        return new EnrollmentResource($this->service->show($enrollment, ['student', 'course']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnrollmentRequest $request, Enrollment $enrollment)
    {
        $this->service->update($enrollment, $request->validated());

        return new EnrollmentResource($enrollment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $this->service->delete($enrollment);

        return response()->noContent();
    }
}
