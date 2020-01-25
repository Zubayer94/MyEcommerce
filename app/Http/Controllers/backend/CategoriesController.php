<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories =Category::orderby('id','desc')->get();
    	return view('backend.pages.category.manage' , compact('categories'));
    }

    public function statusUpdate($id)
    {
    	$category = Category::find($id);
	        if (!is_null($category)) {
	        	if ($category->category_status == 1) {
	        		$category->category_status = 0;
	        		$category->save();
	        		session()->flash('alert', $category->name . ' Category is unpublished now!!');
	        		return back();
	        	}
	        	elseif ($category->category_status == 0) {
	        		$category->category_status = 1;
	        		$category->save();
	        		session()->flash('success', $category->name . ' Category is published now!!');
	        		return back();
	        	}
	            
	        }
	        
    }

    public function input()
    {
    	$parent_categories = Category::orderby('name' , 'desc')->where('parent_id' , 0)->get();
    	return view('backend.pages.category.create' , compact('parent_categories'));
    }

    public function store(Request $request)
    {
    	
    	$this->validate($request, [
            'name' => 'bail|unique:categories|required|max:160',
            'description' => 'required|max:160',
            'category_status' => 'required|numeric',
            'parent_id' => 'required|numeric',
        ],
        [
        	'name.required' => 'Please enter a category name!',
        	'name.max' => 'Your name should be under 160 character max!',
        	'description.required' => 'Please give description!',
        	'description.max' => 'Your description should be under 160 character max!',
        	'category_status.required' => 'Please check category status!',
        	'parent_id.required' => 'Please select any option from Parent Category!',
        	'parent_id.numeric' => 'Fill the Parent Category!',
        ]);


        $category = new Category;
	    $category->name = $request->name;
		$category->description = $request->description;
		$category->slug = str_slug($request->name);
	    $category->category_status = $request->category_status;
	    $category->parent_id = $request->parent_id;
	    
	    //image insert
	    if ( $request->image!= NULL) {
	    	$image = $request->file('image');
            $filename = uniqid(rand()).time() . '.' . $image->getClientOriginalExtension();
            //str_random(10) can also be used for random name
            $location = public_path('images/categories/' .$filename);
            Image::make($image)->save($location);
            $category->image = $filename;
        }

	    $category->save();
	    session()->flash('success', $category->name . ' Category has been added successfully!!');
	    return back();
	}
	
	public function edit($id)
    {
		$category = Category::find($id);
		$parent_categories = Category::orderby('name' , 'desc')->where('parent_id' , 0)->get();
        return view('backend.pages.category.edit' , compact('category' , 'parent_categories'));
	}
	
	public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'bail|required|max:160',
            'description' => 'required|max:160',
            'category_status' => 'required|numeric',
            'parent_id' => 'required|numeric',
        ],
        [
        	'name.required' => 'Please enter a category name!',
        	'name.max' => 'Your name should be under 160 character max!',
        	'description.required' => 'Please give description!',
        	'description.max' => 'Your description should be under 160 character max!',
        	'category_status.required' => 'Please check category status!',
        	'parent_id.required' => 'Please select any option from Parent Category!',
        	'parent_id.numeric' => 'Fill the Parent Category!',
        ]);

    	$category = Category::find($id);
        $category->name = $request->name;
	    $category->description = $request->description;
	    $category->category_status = $request->category_status;
	    $category->parent_id = $request->parent_id;
        
        
        if ($request->image != NULL) {
        	//first delete old photo
			if(File::exists(public_path('images/categories/' . $category->image))){
				File::delete(public_path('images/categories/' . $category->image));
				}
       		// then upload new photo
            $image = $request->file('image');
            $filename = uniqid(rand()).time() . '.' . $image->getClientOriginalExtension();
            //str_random(10) can also be used for random name
            $location = public_path('images/categories/' .$filename);
            Image::make($image)->save($location);
            $category->image = $filename;
        }
        $category->save();
        session()->flash('success', $category->name .  ' Category has been edited successfully!!');
    	return redirect()->route('admin.categories');
	}
	
	public function delete($id)
    {
		$category = Category::find($id);
		$c_name = $category->name;
            if (!is_null($category)) {

                if ( $category->parent_id == 0) {
					$child_categories = Category::orderby('id' , 'desc')->where('parent_id' , $category->id)->get();
					foreach ($child_categories as $child ) {
						if(File::exists(public_path('images/categories/' . $child->image))){
							File::delete(public_path('images/categories/' . $child->image));
						}
						$child -> delete();
					}
				}

            	if(File::exists(public_path('images/categories/' . $category->image))){
					File::delete(public_path('images/categories/' . $category->image));
				}
            	$category->delete();
            
            }
            session()->flash('success',  $c_name . ' Category has been deleted successfully!!');
            return back();
	}
	
	
}
