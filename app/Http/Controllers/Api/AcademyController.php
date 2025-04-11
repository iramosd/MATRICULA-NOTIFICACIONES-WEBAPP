<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcademyRequest;
use App\Http\Resources\AcademyResource;
use App\Models\Academy;
use App\Services\AcademyService;
use Illuminate\Http\Request;

class AcademyController extends Controller
{

    public function __construct(
        private readonly AcademyService $service
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AcademyResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademyRequest $request)
    {
        return new AcademyResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Academy $academy)
    {
        return new AcademyResource($this->service->show($academy));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademyRequest $request, Academy $academy)
    {
        $this->service->update($academy, $request->validated());

        return new AcademyResource($academy);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academy $academy)
    {
        $this->service->delete($academy);

        return response()->noContent();
    }
}
