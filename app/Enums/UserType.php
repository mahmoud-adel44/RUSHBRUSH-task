<?php

namespace App\Enums;

enum UserType: int
{
    case ADMIN = 1;

    case CUSTOMER = 2;

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    public function isCustomer(): bool
    {
        return $this === self::CUSTOMER;
    }

    public function name(): string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::CUSTOMER => 'customer',
        };
    }
}
