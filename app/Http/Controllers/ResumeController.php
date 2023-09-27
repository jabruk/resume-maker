<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeStoreRequest;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ResumeController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResumeStoreRequest $request)
    {
        // dd(123);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {
        return view('resume.edit', [
            'user' => $request->user(),
            'resume' => $request->user()->resume,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResumeStoreRequest $request, Resume $resume)
    {
        $request->resume->fill($request->validated());

    //    dd($request->it_position);

        $request->resume->it_position = $request->it_position;
        $request->resume->introduction_text = $request->introduction_text;
        $request->resume->inspire_phrase = $request->inspire_phrase;
        $request->resume->about_me = $request->about_me;
        $request->resume->save();
        return Redirect::route('resume.edit', $request->resume)->with('status', 'resume-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
