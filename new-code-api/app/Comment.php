<?php

namespace App;

use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'user_name', 'comment'
    ];

    public function post() {
        $this->belongsTo(Post::class);
    }
    public function user() {
        $this->belongsTo(User::class);
    }
}
