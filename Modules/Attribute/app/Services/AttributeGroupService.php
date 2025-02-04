<?php

namespace Modules\Attribute\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Attribute\Models\AttributeGroup;
use Modules\Attribute\Repositories\AttributeGroupRepository;

class AttributeGroupService
{
    public function __construct(protected AttributeGroupRepository $attributeGroupRepository)
    {
    }

    public function index(): Collection
    {
        return $this->attributeGroupRepository->all();
    }

    public function find(string|int $id): AttributeGroup
    {
        return $this->attributeGroupRepository->find($id);
    }

    public function store(array $data): AttributeGroup
    {
        return $this->attributeGroupRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->attributeGroupRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Attribute group could not be updated.', 500);
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->attributeGroupRepository->delete($id);

        if (!$status) {
            throw new Exception('Attribute group could not be deleted.', 500);
        }
    }
}