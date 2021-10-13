<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogHeader extends Component
{
    public $isIndexPage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isIndexPage =false)
    {
        $this->isIndexPage = $isIndexPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-header');
    }
}
