<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\OrderCommentFactory;

class OrderComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'comment',
        'customer_notified',
        'order_id',
    ];

    // protected static function newFactory(): OrderCommentFactory
    // {
    //     // return OrderCommentFactory::new();
    // }
}
