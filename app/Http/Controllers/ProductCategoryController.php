<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProducCategorytRequest;
use App\Http\Requests\UpdateProducCategorytRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CreateProducCategorytRequest $request)
    {
        ProductCategory::create([
            'name' => $request['name'],
        ]);

        return redirect(route('catalog'));
    }

    public function edit($id)
    {
        return view('pages.category.edit', ['category' => ProductCategory::findOrFail($id)]);
    }

    public function update(UpdateProducCategorytRequest $request, $id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update([
            'name' => $request['name'],
        ]);

        return redirect(route('catalog'));
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();
        return redirect(route('catalog'));
    }
}
