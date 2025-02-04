<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Attribute\Database\Factories\AttributeFamilyFactory;

class AttributeFamily extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): AttributeFamilyFactory
    // {
    //     // return AttributeFamilyFactory::new();
    // }

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code',
        'name',
        'status',
        'is_user_defined',
    ];

    public function attributeGroups(): HasMany
    {
        return $this->hasMany(AttributeGroup::class);
    }
}
