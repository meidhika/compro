<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_profile',
        'judul',
        'sub_judul',
        'deskripsi',
        'awal_kerja',
        'akhir_kerja',

    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_profile');
    }
    protected $date = 'deleted_at';
}
