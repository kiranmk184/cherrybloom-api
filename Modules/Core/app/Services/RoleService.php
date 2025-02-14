<?php

namespace Modules\Core\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Models\Role;
use Modules\Core\Repositories\RoleRepository;

class RoleService
{
    public function __construct(protected RoleRepository $roleRepository)
    {
    }

    public function index(): Collection
    {
        return $this->roleRepository->all();
    }

    public function show(string|int $id): Role
    {
        return $this->roleRepository->find($id);
    }

    public function store(array $data): Role
    {
        return $this->roleRepository->store($data);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->roleRepository->update($id, $data);

        if (!$status) {
            throw new Exception('Failed to update channel.');
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->roleRepository->delete($id);

        if (!$status) {
            throw new Exception('Failed to delete channel.');
        }
    }
}