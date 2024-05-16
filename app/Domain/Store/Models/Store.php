<?php

namespace App\Domain\Store\Models;

use App\Domain\Book\Models\Book;
use Database\Factories\StoreFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
