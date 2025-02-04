<?php

namespace Modules\Attribute\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Attribute\Models\AttributeFamily;
use Modules\Attribute\Repositories\AttributeFamilyRepository;

class AttributeFamilyService
{
    public function __construct(protected AttributeFamilyRepository $attributeFamilyRepository)
    {
    }

    public function index(): Collection
    {
        return $this->attributeFamilyRepository->all();
    }

    public function show(string|int $id): AttributeFamily
    {
        return $this->attributeFamilyRepository->find($id);
    }

    public function store(array $data): AttributeFamily
    {
        return $this->attributeFamilyRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->attributeFamilyRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Attribute family could not be updated.', 500);
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->attributeFamilyRepository->delete($id);

        if (!$status) {
            throw new Exception('Attribute family could not be deleted.', 500);
        }
    }
}