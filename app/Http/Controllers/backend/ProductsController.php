<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductImage;
use Image;
use File;


class ProductsController extends Controller
{
    public function index()
    {
    	$products =Product::orderby('id','desc')->get();
    	return view('backend.pages.product.manage' , compact('products'));
    }

    public function input()
    {
    	return view('backend.pages.product.create');
	}
	
	public function statusUpdate($id)
    {
    	$product = Product::find($id);
	        if (!is_null($product)) {
	        	if ($product->status == 1) {
	        		$product->status = 0;
	        		$product->save();
	        		session()->flash('alert', $product->name . ' product is unpublished now!!');
	        		return back();
	        	}
	        	elseif ($product->status == 0) {
	        		$product->status = 1;
	        		$product->save();
	        		session()->flash('success', $product->name . ' product is published now!!');
	        		return back();
	        	}
	            
	        }
	        
    }

    public function store(Request $request)
    {
    	
    	$this->validate($request, [
            'name' => 'bail|unique:products|required|max:160',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'pic' => 'required',
        ],
        [
        	'name.required' => 'Please enter a product name!',
        	'name.max' => 'Your name should be under 160 character max!',
        	'description.required' => 'Please give description!',
        	'price.required' => 'Please enter price!',
        	'price.numeric' => 'Your price is not numeric!',
			'category_id.required' => 'Please select Category!',
			'category_id.numeric' => 'Fill the Product Category!',
			'brand_id.required' => 'Please select Brand!',
			'brand_id.numeric' => 'Fill the Product Brand!',
        	'quantity.required' => 'Please enter quantity!',
        	'pic.required' => 'Please give product picture!',
        	'quantity.numeric' => 'Your quantity is not numeric!',
        ]);


            $product = new Product;
		    $product->name = $request->name;
		    $product->description = $request->description;
		    $product->price = $request->price;
		    $product->quantity = $request->quantity;
		    
		    $product->slug = str_slug($request->name);
			$product->category_id = $request->category_id;
			$product->brand_id = $request->brand_id;
		    $product->status = $request->status;
		    $product->admin_id = 1;
		    $product->save();

		    if ( count($request->pic) > 0) {
            foreach ($request->pic as $image) {
                $filename = uniqid(rand()).time() . '.' . $image->getClientOriginalExtension();
                //str_random(10) can also be used for random name
                $location = public_path('images/products/' .$filename);
                Image::make($image)->save($location);

                $product_image = new productImage;
                $product_image->product_id = $product->id;
                $product_image->image = $filename;
                $product_image->save();
            }
        }
		    session()->flash('success', $product->name . ' Product has been added successfully!!');
		    return back();
    }
    public function view(Request $get)
    {
    	$id = $get->id;
    	$product =Product::find($id);
    	return $product;
    }

    public function edit($id)
    {
    	$product = Product::find($id);
        return view('backend.pages.product.edit' , compact('product'));
    }
    public function delete($id)
    {
    	$product = Product::find($id);
            if (!is_null($product)) {
                
            	foreach ($product->images as $image) {
        			if(File::exists(public_path('images/products/' . $image->image))){
        			    File::delete(public_path('images/products/' . $image->image));
        			  }
            	}
            	$product->delete();
            	// $pic = ProductImage::where('product_id',$product->id);
            	// $pic->delete();
            }
            session()->flash('success', $product->name . ' Product has been deleted successfully!!');
            return back();
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'bail|required|max:160',
            'description' => 'required',
            'price' => 'required|numeric',
			'quantity' => 'required|numeric',
			'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ],
        [
        	'name.required' => 'Please enter a name!',
        	'name.max' => 'Your name should be under 160 character max!',
        	'description.required' => 'Please give description!',
        	'price.required' => 'Please enter price!',
        	'price.numeric' => 'Your price is not numeric!',
        	'quantity.required' => 'Please enter quantity!',
			'quantity.numeric' => 'Your quantity is not numeric!',
			'category_id.required' => 'Please select Category!',
			'category_id.numeric' => 'Fill the Product Category!',
			'brand_id.required' => 'Please select Brand!',
			'brand_id.numeric' => 'Fill the Product Brand!',
        ]);

    	$product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->category_id = $request->category_id;
		$product->brand_id = $request->brand_id;
        
        
        if ($request->pic != NULL) {
        	//first delete old photo
        	foreach ($product->images as $image) {
    			if(File::exists(public_path('images/products/' . $image->image))){
    			    File::delete(public_path('images/products/' . $image->image));
    			  }
        	}
        	$pic = ProductImage::where('product_id',$product->id);
        	$pic->delete();
       		// then upload new photo
            foreach ($request->pic as $image) {
	            $filename = uniqid(rand()).time() . '.' . $image->getClientOriginalExtension();
	            $location = public_path('images/products/' .$filename);
	            Image::make($image)->save($location);

	            $product_image = new ProductImage;
	            $product_image->product_id = $product->id;
	            $product_image->image = $filename;
	            $product_image->save();
		        }
        }
        $product->save();
        session()->flash('success', $product->name . ' Product has been updated successfully!!');
    	return redirect()->route('admin.products');
    }

}
