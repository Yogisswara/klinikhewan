<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
