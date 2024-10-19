<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DogOwners extends Pivot
{
    use HasFactory;

    protected $table = 'dog_owner';

    public function walks(): HasMany {
        return $this->hasMany(Walks::class);
    }

    public function dog(): BelongsTo {
        return $this->belongsTo(Dogs::class, 'dog_id', 'id'); 
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(Owners::class, 'owner_id', 'id'); 
    }
}
