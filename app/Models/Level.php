<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['nama_level'];
    // Mendefinisikan relasi one-to-many dengan User
    public function users()
    {
        return $this->hasMany(User::class, 'id_level');
    }
}
