<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'jumlah',
        'lokasi',
        'status'
    ];

    public function borrowals()
    {
        return $this->hasMany(Borrowal::class);
    }
}
