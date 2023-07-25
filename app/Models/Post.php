<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'slug',
        'image',
        'status'
    ];

    const ACTIVE = 'ACTIVO';

    const NAME = [
        'Post-prueba',  
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // scope
    public function scopeActive($query)
    {
        return $query->where('status', Post::ACTIVE);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeHandlerNotPost($query, array $array)
    {
        return $query->whereNotIn('id', $array);
    }

    // Accessor

    public function getFullCreatedAtAttribute() {
        return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->created_at)->format('h:i A');
    }

    public function getFullUpdatedAtAttribute() {
        return Carbon::parse($this->updated_at)->toFormattedDateString().' - '.Carbon::parse($this->updated_at)->format('h:i A');
    }

    public function getDescriptionShortAttribute(){
        
        return substr($this->description,0,100);
        
    }
}
