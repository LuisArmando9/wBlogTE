<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Comment;
class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $comments = Comment::where("active", "1")->get(["id", "userName"]);

        return view('components.navbar')->with("comments", $comments);
    }
}
