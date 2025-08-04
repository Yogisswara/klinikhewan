<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'telepon',
        'jenis_layanan',
        'tanggal',
        'catatan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
