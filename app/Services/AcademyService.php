<?php
namespace App\Services;

use App\Contracts\AcademyServiceInterface;
use App\Models\Academy;
use Illuminate\Pagination\LengthAwarePaginator;

class AcademyService implements AcademyServiceInterface
{
        public function list(?array $request = null, ?array $with = []): LengthAwarePaginator
        {
            if (count($with) > 0) return Academy::with($with)->paginate();

            return Academy::paginate();
        }

        public function show(Academy $academy, ?array $with = []): ?Academy
        {
            if (count($with) > 0) return $academy->load($with);

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
