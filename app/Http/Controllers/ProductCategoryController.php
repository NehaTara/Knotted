<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_category.index', [
            'product_categories' => ProductCategory::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_category.form', [
                'productcategory' => (new ProductCategory()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:product_categories',
    ]);

    // Ensure the slug is unique by appending a timestamp
    $validated['slug'] .= '-' . time();

    ProductCategory::create($validated);

    return redirect()->route('product-category.index')->with('success', 'Product Category successfully created!');
}

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product_category.form', [
            'productcategory' => $productCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_categories',
        ]);

        $validated['slug'] .= '-' . time();

        $productCategory->update($validated);

        return redirect()->route('product-category.index')->with('success', 'Product Category successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('product-category.index');
    }
}
