<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        $last4 = $request->input("last4");

        if ($last4){
            $projects = Project::with('type', 'user', 'technologies')
                        ->orderBy('created_at', 'DESC')
                        ->limit(4)
                        ->get();
        }else {
            $projects = Project::with('type', 'user', 'technologies')->get();
        }

        return response()->json($projects);
    }

    public function show(Project $project){
        $project->load('type', 'user', 'technologies');

        return response()->json($project);
    }
}
