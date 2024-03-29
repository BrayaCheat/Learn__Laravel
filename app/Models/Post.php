<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'table_post';
    use HasFactory;

    protected $fillable = [
        'title',
        'article'
    ];
}
