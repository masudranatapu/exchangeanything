<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;

class BlogComment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id ',
        'name',
        'email',
        'body',
        'image',
        'status',
        'comment_id',
    ];

    public function post(){

        return $this->belongsTo(Post::class);
    }
}
