<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha','imagen', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class,'foto_id','id');//establezco relacion entre votos y fotos(cojo el foto_id y id es para indicar que esos nombre de las clumnas de las tabalas son foraneos)
    }
}
