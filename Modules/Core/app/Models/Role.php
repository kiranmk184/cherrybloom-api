<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Admin\Models\Admin;

// use Modules\Core\Database\Factories\RoleFactory;

class Role extends Model
{
    use HasFactory;

    // protected static function newFactory(): RoleFactory
    // {
    //     // return RoleFactory::new();
    // }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'permission_type',
        'permissions',
    ];

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(Admin::class);
    }
}
