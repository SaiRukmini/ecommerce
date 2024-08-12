<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->closeButton()->addSuccess('The category has been added successfully');
        return redirect()->back();
    }
    public function delete_category($id)
    {
        $data = Category::find($id);
        $image_path=public_path('products/'.$data->image); 
        if(file_exists($image_path))
        {
            unlink($image_path);        //it will delete the image that is saved in public folder
        }  
        $data->delete();
        toastr()->closeButton()->addSuccess('Category deleted successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->closeButton()->addSuccess('The category has been updated successfully');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category=Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data=new Product;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();   //to get unique image name for every image
            $request->image->move('products',$imagename);                 // to save the images in products folder which got created in public folder
            $data->image=$imagename;
        }
        $data->save();
        toastr()->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $product=Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {
        $data=Product::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('Product deleted successfully');
        return redirect()->back();
    }

    public function update_product($id)
    {
        $data=Product::find($id);
        $category=Category::all();
        return view('admin.update_page',compact('data','category'));
    }

    public function edit_product(Request $request,$id)
    {
        $data=Product::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();  
            $request->image->move('products',$imagename);                 
            $data->image=$imagename;
        }
        $data->save();
        toastr()->closeButton()->addSuccess('Product Added Successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search=$request->search;
        $product=Product::where('title','LIKE','%'.$search.'%')
        ->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));
    }
}
