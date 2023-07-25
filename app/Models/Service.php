<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'status'
    ];

    const ACTIVE = 'ACTIVO';

    const NAME = [
        'Servicio-prueba',    
    ];

    //Relaciones

    public function subServices() {
        return $this->hasMany(SubService::class);
    }

    public function servicesHasclients() {
        return $this->hasMany(ServicesHasclient::class);
    }

    // scope
    public function scopeSearch($query, $search)
    {
        return $query->where('name','like', '%'.$search.'%')
                            ->orWhere('status','like', '%'.$search.'%');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Service::ACTIVE);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
