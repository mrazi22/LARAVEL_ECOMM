<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Products;
use App\Models\Order;

class AdminController extends Controller
{

    public function view_category()
    {

        $data = Category::all();

        return view('admin.category', compact('data'));

        


     
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|alpha',
        ], [
            'category.alpha' => 'Only letters are allowed for category name.',
        ]);
    
        $data = new Category();
        $data->category_name = $request->category;
        $data->save();
    
        return redirect()->back()->with('message', 'Category Added Successfully');
    
    }
    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        request()->validate([
            'product_title' => 'required|string|max:255|alpha',
            'product_description' => 'required|string|max:255|alpha',
            'product_price' => 'required |integer',
            'product_quantity' => 'required |integer',
            'product_category' => 'required',
            'product_image' => 'required|mimes:jpeg,png,jpg',

        ]);
        $product = new Products();
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->category = $request->product_category;
        $product->discount_price = $request->product_discount_price;
        $image = $request->product_image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->product_image->move('productimage', $imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $product = Products::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with( 'message','product deleted succesfully');
    }

    public function edit_product($id)
    {

        $product = Products::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        request()->validate([
            'product_title' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
            'product_price' => 'required |integer',
            'product_quantity' => 'required |integer',
            'product_category' => 'required',
            'product_image' => 'mimes:jpeg,png,jpg',
        ]);
        $product = Products::find($id);
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->category = $request->product_category;
        $product->discount_price = $request->product_discount_price;
        $image = $request->product_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->product_image->move('productimage', $imagename);
            $product->image = $imagename;
        }
        $product->save();
        return redirect()->back()-> with('message', 'Product Updated Successfully');
    }

    public function view_order()
    {
       
        $order = Order::all();
        return view('admin.order', compact('order'));

    }

    public function update_status($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->save();
        return redirect()->back();
        
    }


}
