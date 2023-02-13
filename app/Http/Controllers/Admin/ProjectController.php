<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::where('user_id', Auth::user()->id)->get(); 

        return view('admin.projects.index', compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // recupero tutti i type
        $types = Type::all();

        //recupero tutte le technologies
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if (key_exists("image", $data)){
            $img_path = Storage::put('projects', $data['image']);
        };

        $project = Project::create([
            ...$data,
            "image" => $img_path ?? '',
            "user_id" => Auth::id()
        ]);

        //controllo se é presente un valore per technologiest
        if($request->has('technologies')) {
            $project->technologies()->attach($data["technologies"]);
        }

        return redirect()->route('admin.projects.show', $project->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // recupero tutti i type
        $types = Type::all();

        //recupero tutte le technologies
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $data = $request->validated();

        if (key_exists("image", $data)){
            $img_path = Storage::put('projects', $data['image']);

            Storage::delete($project->image);
        };

        $project->update([
            ...$data,
            "image" => $img_path ?? $project->image
        ]);

        if($request->has('technologies')) {
            $project->technologies()->sync($data["technologies"]);
        }

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }

        //annullo tutte le relazioni
        $project->technologies()->detach();
        
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
