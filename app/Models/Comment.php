<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content','user_id','article_id'
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function article()
    {
       return $this->belongsTo(article::class, 'article_id', 'id');
    }

}
