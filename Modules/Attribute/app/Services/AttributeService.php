<?php

namespace Modules\Attribute\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Attribute\Models\Attribute;
use Modules\Attribute\Repositories\AttributeRepository;

class AttributeService
{
    public function __construct(
        protected AttributeRepository $attributeRepository,
        protected AttributeGroupService $attributeGroupService
    ) {
    }

    public function index(): Collection
    {
        return $this->attributeRepository->all();
    }

    public function show(string|int $id): Attribute
    {
        return $this->attributeRepository->find($id);
    }

    public function store(array $data, string|int $attribute_group_id): Attribute
    {
        $attribute = $this->attributeRepository->store($data);
        $attribute->attributeGroups()->attach($attribute_group_id, [
            'position' => $data['position'] ?? 1,
        ]);

        return $attribute;
    }

    public function update(string|int $id, array $data)
    {
        if ($data['attribute_group_id']) {
            $attribute = $this->attributeRepository->find($id);
            $attributeGroups = $attribute->attributeGroups()->get();
            if ($attributeGroups->contains($data['attribute_group_id'])) {
                $attribute->attributeGroups()->syncWithoutDetaching([
                    $data['attribute_group_id'] => ['position' => $data['position'] ?? 1,]
                ]);
            } else {
                $attribute->attributeGroups()->attach($data['attribute_group_id'], [
                    'position' => $data['position'] ?? 1,
                ]);
            }
        }

        $status = $this->attributeRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update attribute.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->attributeRepository->find($id)->delete();

        if (!$status) {
            throw new Exception('Failed to delete attribute.');
        }
    }
}