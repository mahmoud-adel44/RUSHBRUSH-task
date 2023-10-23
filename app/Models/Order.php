<?php

namespace App\Models;


use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasUlids;

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected $attributes = [
        'status' => OrderStatus::PENDING
    ];

    public function uniqueIds(): array
    {
        return ['number'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function addItems(array $items): void
    {
        foreach ($items as $item) {
            $this->items()->create($item);
        }
    }
}
