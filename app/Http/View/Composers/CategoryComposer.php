<?php

namespace App\View\Components;

use App\Models\Categories;
use Illuminate\View\View;

class CategoryComposer
{
    
    protected $users;
 

    public function __construct()
    {

    }
 
    public function compose(View $view)
    {
        $categories = Categories::select('id','name')->get();
       
        $view->with('categories', $categories);
    }
}