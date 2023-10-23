<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PENDING = 1;

    case PROCESSING = 2;

    case SHIPPING = 4;

    case COMPLETED = 5;

    case CANCELLED = 6;

    public function name(): string
    {
        return match ($this) {
            self::PENDING => 'pending',
            self::PROCESSING => 'processing',
            self::SHIPPING => 'shipping',
            self::COMPLETED => 'completed',
            self::CANCELLED => 'cancelled',
        };
    }

}
