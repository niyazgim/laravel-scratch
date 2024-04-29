<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function create()
    {
        return view('pages.product.create', ['categories' => ProductCategory::all()]);
    }

    public function store(CreateProductRequest $request)
    {
        if (!$request->hasFile('image'))
            return back()->withInput()->withErrors(['image' => 'No image']);
        $image = $request->file('image');
        $filename = time() . "." . $image->getClientOriginalExtension();
        $image->storeAs('public/products', $filename);

        Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'image' => $filename,
            'category_id' => $request['category_id'],
        ]);

        return redirect(route('catalog'));
    }

    public function edit($id)
    {
        return view('pages.product.edit', ['product' => Product::findOrFail($id), 'categories' => ProductCategory::all()]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request['image']) {
            if (!$request->hasFile('image'))
                return back()->withInput()->withErrors(['image' => 'No image']);
            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $image->storeAs('/public/products', $filename);
            $filePath = storage_path('app/public/products/' . $product->image);
            if (file_exists($filePath)) unlink($filePath);
            $product->update([
                'image' => $filename,
            ]);
        }

        $product->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
        ]);

        return redirect(route('catalog'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $filePath = storage_path('app/public/products/' . $product->image);
        if (file_exists($filePath)) unlink($filePath);
        $product->delete();
        return redirect(route('catalog'));
    }
}
