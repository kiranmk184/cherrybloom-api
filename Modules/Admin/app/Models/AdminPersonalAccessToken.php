<?php

namespace Modules\Admin\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
// use Modules\Admin\Database\Factories\AdminPersonalAccessTokenFactory;

class AdminPersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $table = "admin_personal_access_tokens";
}
