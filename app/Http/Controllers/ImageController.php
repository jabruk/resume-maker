<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUpdateRequest;
use App\Models\Image;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(1);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

        // $image_path = $request->file('image')->store('image', 'public');

        // $data = Image::create([
        //     'image' => $image_path,
        // ]);

        // session()->flash('success', 'Image Upload successfully');

        // return redirect()->route('image.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        dd(1);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        dd(1);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageUpdateRequest $request, Image $image)
    {
        $images = [];
        if ($request->images){
            foreach($request->images as $key => $image)
            {
                $imageName = time().rand(1,99).'.'.$image->extension();  
                // $image->move(public_path('images'), $imageName);
                $image->storeAs('images', $imageName);
                $images[$key]['name'] = $imageName;
                $images[$key]['resume_id'] = $request->resume_id;
            }
        }
    
        foreach ($images as $key => $image) {
            $finalImage = new Image();
            $finalImage->image = $image['name'];
            $finalImage->resume_id = $image['resume_id'];
            
            $finalImage->save();
        }

        $resume = Resume::findOrFail($request->resume_id);;
        return Redirect::route('resume.edit', $resume)->with('status', 'image-updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
