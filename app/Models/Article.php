<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'tag_id', 'title', 'content'];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function tag() : BelongsTo {
        return $this->belongsTo(Tag::class);
    }
}
