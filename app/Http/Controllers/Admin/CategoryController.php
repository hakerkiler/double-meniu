<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id', '<>', 0)->get();
        //dd($category);
        return view('admin.category.create')
            ->with('category', $category);
    }
}
