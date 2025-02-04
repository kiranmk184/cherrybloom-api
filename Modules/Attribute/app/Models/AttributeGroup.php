<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Modules\Attribute\Database\Factories\AttributeGroupFactory;

class AttributeGroup extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): AttributeGroupFactory
    // {
    //     // return AttributeGroupFactory::new();
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
        'attribute_family_id',
        'name',
        'position',
        'is_user_defined'
    ];

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(
            Attribute::class,
            'attribute_group_mappings',
            'attribute_group_id',
            'attribute_id'
        );
    }

    public function attributeFamily(): BelongsTo
    {
        return $this->belongsTo(AttributeFamily::class);
    }
}
