<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $product_list = Products::all();
        return view('admin.products.index', compact('product_list'));
    }

    public function create(){
        return view('admin.products.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'description' => 'required',
            'price' => 'required',
            'quantity_in_stock' => 'required',
            'category' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
            'status' => 'required'
        ], [
            'name.min' => 'The name of sweet be atleast of 3 words',
            'quantity_in_stock.required' => 'The Quantity of product must be filled'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = null;
        if ($request->hasFile('product_image')) {
            $directory = 'uploads/product_image';
            
            if (!is_dir(public_path($directory))) {
                mkdir(public_path($directory), 0755, true); 
            }

            $imageName = str_replace(' ', '_', clean_single_input($request->name)) . '_product_image_' . time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path($directory), $imageName);
        }
       
        // $sku = 'SWT-'.Str::upper(Str::random(5));
        $productsOrderNumber = Products::latest('id')->first();
        if($productsOrderNumber){
            $sku = 'SWT'.str_pad($productsOrderNumber, 6, '0', STR_PAD_LEFT);
        }else{
            $sku = 'SWT000001';
        }

        Products::create([
            'sku' => $sku,
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'quantity_in_stock' => $request->quantity_in_stock,
            'category' => $request->category,
            'status' => $request->status,
            'product_image' => $imageName,
            'description' => $request->description,
            'rating' => 0
        ]);
        
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function show(){
        //
    }

    public function edit($id){
        $product_details = Products::findOrFail($id);
        return view('admin.products.edit', compact('product_details'));
    }

    public function update(Request $request, $id){
        $product = Products::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'description' => 'required',
            'price' => 'required',
            'quantity_in_stock' => 'required',
            'category' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',  
            'status' => 'required'
        ], [
            'name.min' => 'The name of sweet be atleast of 3 words',
            'quantity_in_stock.required' => 'The Quantity of product must be filled'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Products::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount_price');
        $product->quantity_in_stock = $request->input('quantity_in_stock');
        $product->category = $request->input('category');
        $product->status = $request->input('status');
        $product->description = $request->input('description');
        
        if ($request->hasFile('product_image')) {
            $directory = 'uploads/product_image';
            if (!is_dir(public_path($directory))) {
                mkdir(public_path($directory), 0755, true); 
            }

            $imageName = str_replace(' ','_',clean_single_input($request->name)). '_profile_image_' .time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path($directory), $imageName);

            $product->product_image = $imageName;
         }

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }
}
