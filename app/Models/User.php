<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Video;
use App\Models\Foto;
use App\Models\Voto;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        //'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

    public function hasVotedFor(Foto $foto)
    {
        return $this->votos()->where('foto_id', $foto->id)->exists();
    }
  
}
