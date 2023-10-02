<?php

namespace App\View\Components\Home;

use App\Models\Project;
use App\Models\Resume;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Portfolio extends Component
{
    public array $items = [];
    public array $tabs = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = Auth::user();
        $resume = Resume::where('user_id', $user->id)->first();
        $projects = Project::with('image')->where('resume_id', $resume->id)->get()->toArray();
        $this->items = $projects;
        $this->tabs = array_unique(Arr::flatten(Arr::pluck($projects, 'category')));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.portfolio');
    }
}
