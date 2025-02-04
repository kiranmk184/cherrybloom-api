<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Modules\Attribute\Database\Factories\AttributeFactory;

class Attribute extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): AttributeFactory
    // {
    //     // return AttributeFactory::new();
    // }

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code',
        'admin_name',
        'type',
        'validation',
        'position',
        'is_required',
        'is_unique',
        'value_per_locale',
        'value_per_channel',
        'is_filterable',
        'is_configurable',
        'is_user_defined',
        'is_visible_on_front',
        'swatch_type',
    ];

    public function attributeGroups(): BelongsToMany
    {
        return $this->belongsToMany(
            AttributeGroup::class,
            'attribute_group_mappings',
            'attribute_id',
            'attribute_group_id'
        );
    }

        
}
