<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    const ACTIVE = 'ACTIVO';

    const NAME = [
        'Administrador',
        'Redactor',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    // scope
    
    function scopeHandleRoleName($query, $name){
        return $query->where('name', $name);
    }

    public function scopeActive($query)
    {
        return $query->where('status', Role::ACTIVE);
    }
}
