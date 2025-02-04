<?php

namespace Modules\Inventory\Services;

use Exception;
use Modules\Inventory\Models\Inventory;
use Illuminate\Database\Eloquent\Collection;
use Modules\Inventory\Repositories\InventoryRepository;

class InventoryService
{
    public function __construct(protected InventoryRepository $inventoryRepository)
    {
    }

    public function index(): Collection
    {
        return $this->inventoryRepository->all();
    }

    public function store(array $data): Inventory
    {
        return $this->inventoryRepository->store($data);
    }

    public function show(string|int $id): Inventory
    {
        return $this->inventoryRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->inventoryRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update inventory.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->inventoryRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete inventory.");
        }
    }
}