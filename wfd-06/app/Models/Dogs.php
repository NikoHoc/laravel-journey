<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dogs extends Model
{
    use HasFactory;

    public function dogOwners(): HasMany {
        return $this->hasMany(DogOwners::class);
    }

    public function owners(): BelongsToMany {
        return $this->belongsToMany(Owners::class);
    }
}
