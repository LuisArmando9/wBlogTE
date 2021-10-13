<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";
    public $timestamps = true;
    protected $fillable = [
        'email',
        'userName',
        'comment',
        'active',
        'postId',
        "created_at"
    ];
}
