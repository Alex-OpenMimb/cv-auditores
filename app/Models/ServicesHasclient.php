<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesHasclient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services_has_clients';

    protected $fillable = [
        'client_id',
        'service_id',
        'message',
        'status'
    ];

    const ACTIVE = 'NOT_LEIDO';


    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    // scope
    public function scopeSearch($query, $search)
    {
        return $query->where('name','like', '%'.$search.'%')
                            ->orWhere('status','like', '%'.$search.'%');
    }

    public function scopeActive($query)
    {
        return $query->where('status', ServicesHasclient::ACTIVE);
    }

    // accessor
    public function getFullCreatedAtAttribute() {
        return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->created_at)->format('h:i:s A');
    }
}
