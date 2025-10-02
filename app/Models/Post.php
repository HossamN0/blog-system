<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'image',
    ];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
