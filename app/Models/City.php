<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;


    protected $fillable=['code','name','country_id'];


    public function Country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


    public function Areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
