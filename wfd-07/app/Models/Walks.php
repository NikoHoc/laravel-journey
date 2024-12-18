<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Walks extends Model
{
    use HasFactory;
    protected $fillable = ['dog_owner_id', 'started_at', 'finished_at'];
    
    public function dogOwner(): BelongsTo {
        return $this->belongsTo(DogOwners::class);
    }
}
