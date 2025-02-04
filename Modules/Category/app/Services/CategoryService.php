<?php

namespace Modules\Category\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepository;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    public function index(): Collection
    {
        return $this->categoryRepository->all();
    }

    public function store(array $data): Category
    {
        return $this->categoryRepository->store($data);
    }

    public function show(string|int $id): Category
    {
        return $this->categoryRepository->find($id);
    }

    public function update(string|int $id, array $data): void
    {
        $status = $this->categoryRepository->update($id, $data);

        if (!$status) {
            throw new Exception("Failed to update category.");
        }
    }

    public function delete(string|int $id): void
    {
        $status = $this->categoryRepository->delete($id);

        if (!$status) {
            throw new Exception("Failed to delete category.");
        }
    }
}