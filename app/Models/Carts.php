<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart_itens;
use App\Models\User;

class Carts extends Model
{
    use HasFactory;

    public function itens(): HasMany
    {
        return $this->hasMany(Cart_itens::class, 'cart_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
