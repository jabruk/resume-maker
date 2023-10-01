<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('projects-component/edit', [
            'resume' => $request->resume,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $project = new Project();
        $imageName = time() . '.' . $request->image_project->extension();
        $request->image_project->move('img', $imageName);
        $finalImage = new Image();
        $finalImage->image = $imageName;
        $finalImage->resume_id = $request->resume_id;
        
        $finalImage->save();
        
        
        $project->name =  $request->project_name;
        $project->github =  $request->project_link;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return view('projects-component/edit', [
            'resume_id' => $request->resume_id,
            'project' => $request->project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
