<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    public $timestamps = true;
    protected $fillable = [
  
        'brief',
        'title',
        'image',
        'active',
        'content',
        'categoryId',
        "created_at"
    ];
}
