<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public const STATUSES = [
        'placed',
        'preparing',
        'ready',
        'picked_up',
        'cancelled',
    ];

    protected $fillable = [
        'user_id',
        'foodtruck_id',
        'status',
        'pickup_code',
        'locker_number',
        'total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function foodtruck(): BelongsTo
    {
        return $this->belongsTo(Foodtruck::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
