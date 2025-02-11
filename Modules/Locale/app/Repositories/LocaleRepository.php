<?php

namespace Modules\Locale\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;
use Modules\Locale\Models\Locale;

class LocaleRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Locale();
    }
}
