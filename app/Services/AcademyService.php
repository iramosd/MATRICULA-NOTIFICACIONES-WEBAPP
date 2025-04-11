<?php
namespace App\Services;

use App\Contracts\AcademyServiceInterface;
use App\Models\Academy;
use Illuminate\Pagination\LengthAwarePaginator;

class AcademyService implements AcademyServiceInterface
{
        public function list(?array $request = null): LengthAwarePaginator
        {
            return Academy::paginate();
        }

        public function show(Academy $academy): ?Academy
        {
            return $academy;
        }

        public function create(array $data): Academy
        {
            return Academy::create($data);
        }

        public function update(Academy $academy, array $data): bool
        {
            return $academy->update($data);
        }

        public function delete(Academy $academy): bool
        {
            return $academy->delete();
        }
}
