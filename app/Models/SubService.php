<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubService extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_subs';

    protected $fillable = [
        'name',
        'description',
        'image',
        'service_id',
        'status'
    ];

    const ACTIVE = 'ACTIVO';

    public function service() {
        return $this->belongsTo(Service::class);
    }

    
}
