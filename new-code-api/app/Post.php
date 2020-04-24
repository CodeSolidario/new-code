<?php

namespace App;

use App\User;
use App\Project;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'user_id', 'user_name', 'title', 'description', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
