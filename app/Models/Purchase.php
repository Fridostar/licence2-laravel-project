<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'pricing_id',
        'outfit_id',
        'user_id',
    ];


    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
    
    public function pricing(): BelongsTo
    {
        return $this->belongsTo(Pricing::class);
    }

    public function outfit(): BelongsTo
    {
        return $this->belongsTo(Outfit::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function outfits(): HasMany
    {
        return $this->hasMany(Outfit::class);
    }
}
