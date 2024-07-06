<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.products.';
    const PATH_UPLOAD = 'products/';
    public function index()
    {
        $data = Product::query()->with(['catalogue', 'tags'])->latest('id')->get();
        //        dd($data->first()->tags->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues', 'colors', 'sizes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProduct = $request->except(['product_variants', 'tags', 'product_galleries']);
        $dataProduct['is_active'] ??= 0;
        $dataProduct['is_hot_deal'] ??= 0;
        $dataProduct['is_good_deal'] ??= 0;
        $dataProduct['is_new'] ??= 0;
        $dataProduct['is_show_home'] ??= 0;
        $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];

        // Lưu ảnh thumbnail vào storage nếu tồn tại
        if ($request->hasFile('img_thumbnail')) {
            $dataProduct['img_thumbnail'] = $request->file('img_thumbnail')->store('products', 'public');
        }

        $dataProductVariantsTmp = $request->product_variants;
        $dataProductVariants = [];
        foreach ($dataProductVariantsTmp as $key => $item) {
            $tmp = explode('-', $key);
            $dataProductVariants[] = [
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
                'quantity' => $item['quantity'],
                'image' => $item['image'] ?? null,
            ];
        }

        $dataProductTags = $request->tags;
        $dataProductGalleries = $request->product_galleries ?: [];

        try {
            DB::beginTransaction();

            /** @var Product $product */
            $product = Product::create($dataProduct);

            foreach ($dataProductVariants as $dataProductVariant) {
                $dataProductVariant['product_id'] = $product->id;

                if ($dataProductVariant['image']) {
                    $dataProductVariant['image'] = $dataProductVariant['image']->store('products', 'public');
                }

                ProductVariant::create($dataProductVariant);
            }

            $product->tags()->attach($dataProductTags);

            // Xử lý ảnh gallery
            foreach ($dataProductGalleries as $image) {
                // Lưu ảnh vào storage và lấy đường dẫn
                $path = Storage::put('products', $image);

                // Tạo mới bản ghi trong bảng ProductGallery
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $path,  // Lưu đường dẫn vào trường image
                ]);
            }

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'catalogues', 'colors', 'sizes', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'catalogues', 'colors', 'sizes', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            // Retrieve all data from the request
            $dataProduct = $request->except(['product_variants', 'tags', 'product_galleries']);
            $dataProduct['is_active'] = $request->has('is_active') ? 1 : 0;
            $dataProduct['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $dataProduct['is_good_deal'] = $request->has('is_good_deal') ? 1 : 0;
            $dataProduct['is_new'] = $request->has('is_new') ? 1 : 0;
            $dataProduct['is_show_home'] = $request->has('is_show_home') ? 1 : 0;
            $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];

            // Update thumbnail image if exists
            if ($request->hasFile('img_thumbnail')) {
                // Remove old thumbnail
                if ($product->img_thumbnail) {
                    Storage::disk('public')->delete($product->img_thumbnail);
                }
                $dataProduct['img_thumbnail'] = $request->file('img_thumbnail')->store('products', 'public');
            }

            // Handle product variants
            $dataProductVariants = [];
            if ($request->has('product_variants')) {
                $dataProductVariantsTmp = $request->product_variants;
                foreach ($dataProductVariantsTmp as $key => $item) {
                    $tmp = explode('-', $key);
                    $dataProductVariants[] = [
                        'product_size_id' => $tmp[0],
                        'product_color_id' => $tmp[1],
                        'quantity' => $item['quantity'],
                        'image' => $item['image'] ?? null,
                    ];
                }
            }

            // Handle tags
            $dataProductTags = [];
            if ($request->has('tags')) {
                $dataProductTags = $request->tags;
            }

            // Handle galleries
            $dataProductGalleries = $request->product_galleries ?: [];

            DB::beginTransaction();

            // Update main product data
            $product->update($dataProduct);

            // Update product variants
            $product->variants()->delete();
            foreach ($dataProductVariants as $dataProductVariant) {
                $dataProductVariant['product_id'] = $product->id;

                if ($dataProductVariant['image']) {
                    $dataProductVariant['image'] = $dataProductVariant['image']->store('products', 'public');
                }

                ProductVariant::create($dataProductVariant);
            }

            // Update tags
            $product->tags()->sync($dataProductTags);

            // Update galleries
            $product->galleries()->delete();
            foreach ($dataProductGalleries as $image) {
                // Save the new image
                $path = Storage::put('products', $image);

                // Create new record in ProductGallery
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                // Xóa ảnh img_thumbnail từ storage nếu tồn tại
                if ($product->img_thumbnail) {
                    Storage::delete($product->img_thumbnail);
                }

                // Xóa hết các tags của sản phẩm
                $product->tags()->sync([]);

                // Xóa hết các galleries của sản phẩm
                $product->galleries()->delete();

                // Xóa hết các variants của sản phẩm
                $product->variants()->delete();

                // Xóa sản phẩm chính
                $product->delete();
            });

            return back()->with('success', 'Xóa sản phẩm và các thông tin liên quan thành công.');
        } catch (\Exception $exception) {
            return back()->with('error', 'Đã có lỗi xảy ra khi xóa sản phẩm và các thông tin liên quan.');
        }
    }
}
