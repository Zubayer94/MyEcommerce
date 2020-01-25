<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use File;

class BrandsController extends Controller
{
    public function index()
    {
    	$brands =Brand::orderby('id','desc')->get();
    	return view('backend.pages.brand.manage' , compact('brands'));
    }

    public function statusUpdate($id)
    {
    	$brand = Brand::find($id);
	        if (!is_null($brand)) {
	        	if ($brand->brand_status == 1) {
	        		$brand->brand_status = 0;
	        		$brand->save();
	        		session()->flash('alert', $brand->name . ' brand is unpublished now!!');
	        		return back();
	        	}
	        	elseif ($brand->brand_status == 0) {
	        		$brand->brand_status = 1;
	        		$brand->save();
	        		session()->flash('success', $brand->name . ' brand is published now!!');
	        		return back();
	        	}
	            
	        }
	        
    }

    public function input()
    {
    	return view('backend.pages.brand.create');
    }

    public function store(Request $request)
    {
    	
    	$this->validate($request, [
            'name' => 'bail|unique:brands|required|max:160',
            'description' => 'required|max:160',
            'brand_status' => 'required|numeric',
        ],
        [
        	'name.required' => 'Please enter a brand name!',
        	'name.max' => 'Your name should be under 160 character max!',
        	'description.required' => 'Please give description!',
        	'description.max' => 'Your description should be under 160 character max!',
        	'brand_status.required' => 'Please check brand status!',
        ]);


        $brand = new Brand;
	    $brand->name = $request->name;
		$brand->description = $request->description;
		$brand->slug = str_slug($request->name);
	    $brand->brand_status = $request->brand_status;
	    
	    //image insert
	    if ( $request->image!= NULL) {
	    	$image = $request->file('image');
            $filename = uniqid(rand()).time() . '.' . $image->getClientOriginalExtension();
            //str_random(10) can also be used for random name
            $location = public_path('images/brands/' .$filename);
            Image::make($image)->save($location);
            $brand->image = $filename;
        }

	    $brand->save();
	    session()->flash('success', $brand->name . ' brand has been added successfully!!');
	    return back();
	}
	
	public function edit($id)
    {
		$brand = Brand::find($id);
        return view('backend.pages.brand.edit' , compact('brand'));
	}
	
	public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'bail|required|max:160',
            'description' => 'required|max:160',
            'brand_status' => 'required|numeric',
        ],
        [
        	'name.required' => 'Please enter a brand name!',
        	'name.max' => 'Your name should be under 160 character max!',
        	'description.required' => 'Please give description!',
        	'description.max' => 'Your description should be under 160 character max!',
        	'brand_status.required' => 'Please check brand status!',
        ]);

        $brand = Brand::find($id);
        $b_name = $brand->name;
        $brand->name = $request->name;
	    $brand->description = $request->description;
	    $brand->brand_status = $request->brand_status;
        
        
        if ($request->image != NULL) {
        	//first delete old photo
			if(File::exists(public_path('images/brands/' . $brand->image))){
				File::delete(public_path('images/brands/' . $brand->image));
				}
       		// then upload new photo
            $image = $request->file('image');
            $filename = uniqid(rand()).time() . '.' . $image->getClientOriginalExtension();
            //str_random(10) can also be used for random name
            $location = public_path('images/brands/' .$filename);
            Image::make($image)->save($location);
            $brand->image = $filename;
        }
        $brand->save();
        session()->flash('success', $b_name . ' has been edited successfully!!');
    	return redirect()->route('admin.brands');
	}
	
	public function delete($id)
    {
        $brand = Brand::find($id);
        $b_name = $brand->name;
            if (!is_null($brand)) {
            	if(File::exists(public_path('images/brands/' . $brand->image))){
					File::delete(public_path('images/brands/' . $brand->image));
				}
            	$brand->delete();
            
            }
            session()->flash('success', $b_name . ' has been deleted successfully!!');
            return back();
	}
}
