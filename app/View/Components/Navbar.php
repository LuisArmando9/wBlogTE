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
    const MAX_COMMENTS = 9;
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
        $comments = Comment::where("active", "1");
        $hasMaxComments = false;
        if($comments->count() > self::MAX_COMMENTS)
        {
            $comments = $comments->skip(0)->take(self::MAX_COMMENTS);
            $hasMaxComments = true;
        }
        return view('components.admin.navbar')
        ->with("comments", $comments->get())
        ->with("hasMaxComments", $hasMaxComments);
    }
}
