<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clothes extends Model
{
    use HasFactory;

    public function reviews(): HasMany {
        return $this->hasMany(Reviews::class);
    }
}
