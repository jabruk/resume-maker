<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUpdateRequest;
use App\Models\Image;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        // dd($image);
        $imagesSave = [];
        $logos = [];
        $i=1;
        if ($request->images){
            // foreach($request->images as $key => $image)
            // {
            //     $imageName = 'me'.$i.'.png';  
            //     File::delete(app_path().'/img/'.$imageName);
            //     // $image->move(public_path('images'), $imageName);
            //     $image->move('img',$imageName );
            //     $images[$key]['name'] = $imageName;
            //     $images[$key]['resume_id'] = $request->resume_id;
            //     $i++;
            // }
            
            // foreach ($images as $key => $image) {
            //     $finalImage = new Image();
            //     $finalImage->image = $image['name'];
            //     $finalImage->resume_id = $image['resume_id'];
                
            //     $finalImage->save();
            // }


            $imageArr = Image::where(['resume_id' => $request->resume_id, 'image_name' => 'me'])->get();
            $i = 0;

            foreach($request->images as $key => $images)
            {
                $meName = 'me';  
                $desired_image = $imageArr->filter(function($item, $key) {
                    return $item->logo == 'me' . $key;
                })->first()
                ;
                if(isset($desired_image) && $desired_image->logo == $meName . $i) {

                    File::delete(app_path().'/img/'.$desired_image->image);
                }
                $imageName = microtime() . '.' . $images->extension();



                $images->move('img',$imageName );
                $imagesSave[$key]['name'] = $meName;
                $imagesSave[$key]['image'] = $imageName;
                $imagesSave[$key]['logo'] = $meName . $i;
                $imagesSave[$key]['resume_id'] = $request->resume_id;
                $i++;

            }   
            $imageArr->map->delete();
            foreach ($imagesSave as $key => $image) {
                $finalImage = new Image();
                $finalImage->image_name = $image['name'];
                $finalImage->image = $image['image'];
                $finalImage->logo = $image['logo'];
                $finalImage->resume_id = $image['resume_id'];
                
                $finalImage->save();
            }

        }
         if ($request->logos){
            

            $logoArr = Image::where(['resume_id' => $request->resume_id, 'image_name' => 'logo'])->get();
            $i = 0;

            foreach($request->logos as $key => $logo)
            {
                $logoName = 'logo';  
                $desired_image = $logoArr->filter(function($item, $key) {
                    return $item->logo == 'logo' . $key;
                })->first()
                ;
                if(isset($desired_image) && $desired_image->logo == $logoName . $i) {

                    File::delete(app_path().'/img/'.$desired_image->image);
                }
                $imageName = microtime() . '.' . $logo->extension();



                $logo->move('img',$imageName );
                $logos[$key]['name'] = $logoName;
                $logos[$key]['image'] = $imageName;
                $logos[$key]['logo'] = $logoName . $i;
                $logos[$key]['resume_id'] = $request->resume_id;
                $i++;

            }   
            $logoArr->map->delete();
            foreach ($logos as $key => $image) {
                $finalImage = new Image();
                $finalImage->image_name = $image['name'];
                $finalImage->image = $image['image'];
                $finalImage->logo = $image['logo'];
                $finalImage->resume_id = $image['resume_id'];
                
                $finalImage->save();
            }


        }
         if ($request->image_hero){
            Image::where(['resume_id' => $request->resume_id,'image_name' => 'hero'])->delete();
            $image_heroName = 'hero';  
            $imageName = microtime() . '.' . $request->image_hero->extension();

            // File::delete(app_path().'/img/'.$imageName);
            $request->image_hero->move('img',$imageName );
            // $image->move(public_path('img'), $image_heroName);
            // Storage::disk('public_uploads')->put('img', $hero);
            $finalImage = new Image();
            $finalImage->image = $imageName;
            $finalImage->image_name = $image_heroName;
            $finalImage->resume_id = $request->resume_id;
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
