<?php

namespace App;

use App\User;
use App\Task;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'title', 'description', 'github_link', 'status'
    ];
    public function users() {
        return $this->belongsToMany(User::class);
    }
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function posts() {
        return $this->hasMany(Post::class)->with('comments');
    }
}
