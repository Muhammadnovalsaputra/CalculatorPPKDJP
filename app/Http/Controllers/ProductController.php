<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Product";
        $datas = Product::with('category')->orderBy('id', 'desc')->get();
        return view('product.index', compact('title', 'datas'));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create Product";
        // Select * from categories
        $categories = Category::get();
        return view('product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'is_active' => $request->is_active,
        ];
        //jika pengguna aplikasi mengupload gambar
        if ($request->hasFile('product_photo')) {
            $path = $request->file('product_photo')->store('products', 'public'); //storage/public/products
            $data['product_photo'] = $path;
        }
        Product::create($data);
        alert()->success('Success', 'Create Product Success');
        return redirect()->to('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Edit Product";
        $edit = product::find($id);
        $categories = category::get();
        return view('product.edit', compact('title', 'edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = product::find($id);
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'is_active' => $request->is_active,
        ];
        if ($request->hasFile('product_photo')) {
            File::delete(public_path('storage/' . $product->product_photo));

            $path = $request->file('product_photo')->store('products', 'public');
            $data['product_photo'] = $path;
        }
        $product->update($data);
        alert()->success('Success', 'Update Product Success');
        return redirect()->to('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ////404

        $product = product::findOrFail($id);
        $product->delete();
        File::delete(public_path('storage/' . $product->product_photo));
        alert()->success('Success!', 'Delete product success');
        return redirect()->to('product');
    }
}
