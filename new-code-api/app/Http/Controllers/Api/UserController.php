<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerTrait;

class UserController extends Controller
{
    use ControllerTrait;

    protected $model;

    public function __construct()
    {
        $this->model = User::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $users = User::with('projects', 'tasks')->get();
            return response()->json($users, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function show($id)
    {
        try{
            $data = User::with('projects')->findOrFail($id);
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function insertImage(Request $request, $id)
    {
        try{
            $image = Images::create($request->toArray());
            $user = User::findOrFail($id);
            $user->image_id = $image->id;
            $user->save();
            return response()->json($user, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }
}
