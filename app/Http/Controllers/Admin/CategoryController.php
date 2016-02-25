<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Category;
use App\Models\CategoryTranslations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psy\Util\Str;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::translatedIn('ro')->get();
        return view('admin.category.index')
            ->with('category', $category);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id', '=', 0)->translatedIn('ro')->get();
        $new_arr_cat = array();
        foreach($category as $cat){
            $new_arr_cat[$cat->id] = $cat->name;
        }
        return view('admin.category.create')
            ->with('category', $new_arr_cat);
    }

    public function store(Request $data)
    {

        $category = new Category();
        if(isset($category->parent_id) && $category->parent_id != '')
            $category->parent_id = $data->parent_id;
        if($category->save()) {
            $return_msg['message_msg'] = 'Crearea categorie!';
            $return_msg['message_type'] = 'success';
            $return_msg['message_closable'] = true;

            foreach($data->trans as $key => $value){

                $category_trans = new CategoryTranslations();
                $category_trans->category_id = $category->id;
                $category_trans->locale = $key;
                $category_trans->name = $value['name'];
                $category_trans->url = Str::slug($value['name'], '-');

                if(!$category_trans->save()){
                    $return_msg['message_msg'] = 'Save Failed!';
                    $return_msg['message_type'] = 'error';
                    $return_msg['message_closable'] = false;
                }

            }

        } else {
            $return_msg['message_msg'] = 'Create failed!';
            $return_msg['message_type'] = 'error';
            $return_msg['message_closable'] = false;
        }
        return redirect()->route('admin.category.index')->with($return_msg);;
    }
}
