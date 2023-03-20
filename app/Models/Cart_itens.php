<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carts;

class Cart_itens extends Model
{
    use HasFactory;

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Carts::class);
    }
}
