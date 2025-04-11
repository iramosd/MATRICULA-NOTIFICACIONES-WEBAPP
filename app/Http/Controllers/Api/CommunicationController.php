<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunicationRequest;
use App\Http\Resources\CommunicationResource;
use App\Models\Communication;
use App\Services\CommunicationService;
use Database\Seeders\CommunicationSeeder;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function __construct(
        private readonly CommunicationService $service
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CommunicationResource::collection($this->service->list(with: ['communicable']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunicationRequest $request)
    {
        return new CommunicationResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Communication $communication)
    {
        return new CommunicationResource($this->service->show($communication, ['communicable']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunicationRequest $request, Communication $communication)
    {
        $this->service->update($communication, $request->validated());

        return new CommunicationResource($communication);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communication $communication)
    {
        $this->service->delete($communication);

        return response()->noContent();
    }
}
