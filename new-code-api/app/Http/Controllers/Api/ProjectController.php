<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerTrait;

class ProjectController extends Controller
{
    use ControllerTrait;

    protected $model;

    public function __construct()
    {
        $this->model = Project::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $projects = Project::with('users', 'tasks', 'posts')->get();
            foreach ($projects as $project) {
                $owner = User::where('id', $project->owner_id)->first();
                $project->owner = $owner;
            }
            return response()->json($projects, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function store(Request $request) {
        try{
            $project = Project::create($request->toArray());
            if ($project) {
                $user_project = DB::table('project_user')->insert([
                    'is_owner' => true,
                    'user_id' => $project->owner_id,
                    'project_id' => $project->id,
                    'status' => 1
                ]);
            }
            return response()->json($project, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }
    public function show($id)
    {
        try{
            $project = Project::with('users', 'tasks', 'posts')->findOrFail($id);
            $owner = User::where('id', $project->owner_id)->first();
            $project->owner = $owner;
            return response()->json($project, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function goProject(Request $request) {
        try{
            $data = $request->all();
            $project = Project::where('id', $data['project_id'])->first();
            $user = User::where('id', $data['user_id'])->first();
            $user_project = DB::table('project_user')->insert([
                'user_id' => $user->id,
                'project_id' => $project->id,
                'status' => 0
            ]);
            return response()->json($project, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }
}
