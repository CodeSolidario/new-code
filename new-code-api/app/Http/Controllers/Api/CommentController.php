<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerTrait;

class CommentController extends Controller
{
    use ControllerTrait;

    protected $model;

    public function __construct()
    {
        $this->model = Comment::class;
    }
}
