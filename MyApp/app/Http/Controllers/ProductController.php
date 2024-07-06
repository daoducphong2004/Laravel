<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with('category')->latest('id')->paginate(6);
        return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('img_thumb');
        if ($request->hasFile('img_thumb')) {
            $pathFile = Storage::putFile('products', $request->file('img_thumb'));
            $data['img_thumb'] = 'storage/' . $pathFile;
        }
        Product::query()->create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        return view('products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('img_thumb');
        if ($request->hasFile('img_thumb')) {
            $pathFile = Storage::putFile('products', $request->file('img_thumb'));
            $data['img_thumb'] = 'storage/' . $pathFile;
        }
        $currentImgthumb = $product->img_thumb;
        $product->update($data);
        if ($request->hasFile('img_thumb') && $currentImgthumb && file_exists($currentImgthumb)) {
            unlink(public_path($currentImgthumb));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if ($product->img_thumb && file_exists($product->img_thumb)) {
            unlink(public_path($product->img_thumb));
        }
        return redirect()->route('products.index');
    }
}
