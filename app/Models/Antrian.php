<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_antrian', 'nama', 'alamat', 'no_hp', 'no_ktp',
        'layanan', 'is_call', 'tanggal_antrian', 'user_id',
    ];

    protected $casts = [
        'tanggal_antrian' => 'date',
        'is_call' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
