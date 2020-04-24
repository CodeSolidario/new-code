<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerTrait;

class TaskController extends Controller
{
    use ControllerTrait;

    protected $model;

    public function __construct()
    {
        $this->model = Task::class;
    }

}
