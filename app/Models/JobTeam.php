<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTeam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_teams';

    protected $fillable = [
        'name',
        'position',
        'profile',
        'phone',
        'image',
        'status'
    ];

    const ACTIVE = 'ACTIVO';

    // scope
    public function scopeActive($query)
    {
        return $query->where('status', JobTeam::ACTIVE);
    }

}
