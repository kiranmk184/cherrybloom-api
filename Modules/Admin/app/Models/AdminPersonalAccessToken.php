<?php

namespace Modules\Admin\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Admin\Database\Factories\AdminPersonalAccessTokenFactory;

class AdminPersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $table = "admin_personal_access_tokens";
}
