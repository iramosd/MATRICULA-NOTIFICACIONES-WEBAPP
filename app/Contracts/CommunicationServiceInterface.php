<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Communication;

interface CommunicationServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Communication $communication): ?Communication;
    public function create(array $data): Communication;
    public function update(Communication $communication, array $data): bool;
    public function delete(Communication $communication): bool;
}