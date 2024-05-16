<?php

namespace App\Domain\Store\Models;

use Database\Factories\StoreFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = [
        'name',
        'address',
        'active'
    ];

    protected static function newFactory(): Factory
    {
        return StoreFactory::new();
    }
}
