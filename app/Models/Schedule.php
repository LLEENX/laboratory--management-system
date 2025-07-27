<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mata_kuliah',
        'kelas',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'ruangan',
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
