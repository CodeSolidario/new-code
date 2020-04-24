<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerTrait;

class PostController extends Controller
{
    use ControllerTrait;

    protected $model;

    public function __construct()
    {
        $this->model = Post::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $posts = Post::with('comments')->get();
            return response()->json($posts, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }

}
