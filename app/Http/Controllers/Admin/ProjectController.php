<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.projects.create", ["types"=> Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $validated = $request->validated();

        if ($request->has('cover_image')) {
            $file_path = Storage::put('projects_images', $request->cover_image);
            $validated['cover_image'] = $file_path;
        }
        

        Project::create($validated);

        return to_route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'), ['types'=> Type::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        if ($request->has('cover_image') && $project->cover_image) {

            Storage::delete($project->cover_image);

            $newImageFile = $request->cover_image;
            $path = Storage::put('projects_images', $newImageFile);
            $validated['cover_image'] = $path;
        }

        $project->update($validated);

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        // POST REDIRECT GET
        return to_route('admin.projects.index');
    }
}
