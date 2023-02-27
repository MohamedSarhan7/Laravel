<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ["title", "author_id", "content"];
    protected $guarded=[];
    public $timestamps=false;
    public function author()
    {
        return $this->belongsTo(UserM::class, 'author_id',"id");
    }


}
