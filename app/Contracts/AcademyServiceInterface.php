<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Academy;

interface AcademyServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Academy $academy): ?Academy;
    public function create(array $data): Academy;
    public function update(Academy $academy, array $data): bool;
    public function delete(Academy $academy): bool;
}
