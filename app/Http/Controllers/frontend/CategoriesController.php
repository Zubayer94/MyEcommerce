<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->where('category_status',1)->first();

        if (!is_null($category)) {
            //finding child category
            if ($category->parent_id != 0) {
                $data = "child";
                return view('frontend.pages.categories.show' , compact('category' , 'data'));
            }
            else {
                $cats = Category::orderBy('id', 'asc')->where('parent_id' , $category->id)->where('category_status',1)->get();
                //finding parent category with no child category
                if ($cats->count() == 0) {
                    $data = "child";
                    return view('frontend.pages.categories.show' , compact('category' , 'data'));
                } else {
                    //finding all child category product by parent category
                    $data = "parent";
                    $cats2 = Category::orderBy('id', 'asc')->where('parent_id' , $category->id)->where('category_status',1)->pluck('id');
                    $products1  = Product::orderby('id', 'asc')->whereIn('category_id', $cats2)->paginate(20);
                    return view('frontend.pages.categories.show' , compact('products1' , 'data' ,'category'));
                }
                
            }
            
        }
        else {
            session()->flash('alert' , 'Sorry! this category doesn\'t exist!');
            return back();
        }
        
    }
}
