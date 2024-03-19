<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'usersid',
        'title',
        'body',
        'image',
        'category',
    ];

    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'postsid');
    }
}
