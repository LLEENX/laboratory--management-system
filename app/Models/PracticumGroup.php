<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticumGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'dosen_id', // foreign key ke User model
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(User::class, 'practicum_group_user', 'practicum_group_id', 'user_id');
    }
}
