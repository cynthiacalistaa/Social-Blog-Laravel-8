<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'usersid',
        'postsid',
        'body',
    ];

    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'postsid');
    }
}
