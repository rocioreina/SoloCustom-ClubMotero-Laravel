<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'foto_id'];

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
