<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'status'
    ];

    const ADMIN     = 1;
    const ACTIVE    = 'ACTIVO';


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function commentResponses() {
        return $this->hasMany(CommentResponse::class);
    }

    public function post() {
        return $this->hasMany(Post::class);
    }

    //scope

    public function scopeAdmin($query)
    {
        return $query->where('id','<>', User::ADMIN);
    }

    public function scopeActive($query)
    {
        return $query->where('status', User::ACTIVE);
    }
}
