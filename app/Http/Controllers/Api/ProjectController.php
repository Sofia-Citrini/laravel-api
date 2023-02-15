<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type', 'user', 'technologies')->paginate(10);

        return response()->json($projects);
    }

    public function show(Project $project){
        $project->load('type', 'user', 'technologies');

        return response()->json($project);
    }
}
