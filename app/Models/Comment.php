<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function author()
    {
        return $this->belongsTo(UserM::class, 'author_id', "id");
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', "id");
    }
}
