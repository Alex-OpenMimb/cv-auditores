<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'company',
        'description',
        'status'
    ];

    const ACTIVE                = 'ACTIVO';
    const NOT_REGISTER          = 'sin registro...';
    const DESCRIPTION_LANDING   = 'Cliente registrado mediante la landing page';
    const DESCRIPTION_BLOG      = 'Cliente registrado mediante los comentarios de los blogs';
    const DESCRIPTION_SERVICE   = 'Cliente registrado mediante solicitud de un servicio';

    // Relaciones
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function servicesHasclients() {
        return $this->hasMany(ServicesHasclient::class);
    }

    // scope
    public function scopeHandlerEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    // Accessor
    public function getFullCreatedAtAttribute() {
        return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->updated_at)->format('h:i A');
    }

    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    public function getPhoneAttribute($value) {
        return $value ? $value: Client::NOT_REGISTER;
    }

    public function getCityAttribute($value) {
        return $value ? ucfirst($value): Client::NOT_REGISTER;
    }

    public function getCompanyAttribute($value) {
        return $value ? ucfirst($value): Client::NOT_REGISTER;
    }

}
