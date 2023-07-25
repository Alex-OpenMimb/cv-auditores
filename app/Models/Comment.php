<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'description',
        'image',
        'post_id',
        'client_id',
        'status'
    ];

    const ACTIVE = 'ACTIVO';

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function commentResponses() {
        return $this->hasMany(CommentResponse::class);
    }

    // scope
    public function scopeActive($query)
    {
        return $query->where('status', Comment::ACTIVE);
    }

    // Accessor
    public function getFullCreatedAtAttribute() {
        return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->updated_at)->format('h:i A');
    }

}
