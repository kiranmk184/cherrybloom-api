<?php

namespace Modules\Channel\Repositories;

use Modules\Channel\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Currency();
    }
}