<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;
use App\Models\Category;

class Categories extends Component
{
    
    public $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category->all();
        $this->categories->map(function($category) {
            if(!request()->routeIs('category.show')) {
                $category->selected = false;
                return $category;
            }
            if(request()->route('category')->id === $category->id)
                $category->selected = true;
            else
                $category->selected = false;
        });
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu.categories');
    }
}
