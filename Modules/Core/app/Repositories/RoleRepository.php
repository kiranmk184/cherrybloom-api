<?php

namespace Modules\Core\Repositories;

use Modules\Core\Models\Role;

class RoleRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Role();
    }
}