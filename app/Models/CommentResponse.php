<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comment_response';

    protected $fillable = [
        'comment_id',
        'user_id',
        'description',
        'status',
    ];

    public function comment() {
        return $this->belongsTo(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Accessor
    public function getFullCreatedAtAttribute() {
        return Carbon::parse($this->created_at)->toFormattedDateString().' - '.Carbon::parse($this->created_at)->format('h:i A');
    }

}
