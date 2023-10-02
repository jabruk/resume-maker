<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

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
        // $project =  Project::with(['image', 'resume'])->find($id);
        return view('projects-component/create', [
            'resume' => $request->resume,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $project = new Project();
        $data = [];
        
        $imageName = time() . '.' . $request->image_project->extension();
        $request->image_project->move('img', $imageName);
        $finalImage = new Image();
        $finalImage->image = $imageName;
        $finalImage->resume_id = $request->resume_id;
        
        
        
        $project->name =  $request->project_name;
        $project->github =  $request->project_link;
        $project->resume_id =  $request->resume_id;
        if($request->category0) {
            $data[0] = $request->category0;
        }
        if($request->category1) {
            $data[1] = $request->category1;
        }
        if($request->category2) {
            $data[2] = $request->category2;
        }
        $project->category = ($data);
        
        $project->save();
        
        
        $finalImage->project_id =  $project->id;
        $finalImage->save();
        $projects = Project::with('image')->get();
       
        
        return Redirect::route('resume.edit',  [
            'user' => $request->user(),
            'resume' => $request->user()->resume,
            'projects' => $projects,
        ])->with('status', 'resume-updated');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $project =  Project::with(['image', 'resume'])->find($id);
        return view('projects-component/edit', [
            'project' => $project,
        ]);
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
        $project->name = $request->project_name;
        $project->github = $request->project_link;
        $data = [];

        if($request->category0) {
            $data[0] = $request->category0;
        }
        if($request->category1) {
            $data[1] = $request->category1;
        }
        if($request->category2) {
            $data[2] = $request->category2;
        }
        $project->category = ($data);
        $project->resume_id =  $request->resume_id;

        $project->save();
        if($request->image_project) {
            File::delete(app_path().'/img/'.$request->image);

            $imageName = time() . '.' . $request->image_project->extension();
            $request->image_project->move('img', $imageName);
            $finalImage = new Image();
            $finalImage->image = $imageName;
            $finalImage->resume_id = $request->resume_id;
            
            $finalImage->project_id =  $project->id;
            $finalImage->save();
        }
        $resume = Resume::find($request->resume_id);
        $user = User::find($resume->user_id);
        $projects = Project::with('image')->where('resume_id', $resume->id);
        return Redirect::route('resume.edit',  [
            'user' => $request->user(),
            'resume' => $request->user()->resume,
            'projects' => $projects,
        ])->with('status', 'resume-updated');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
