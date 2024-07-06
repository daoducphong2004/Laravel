<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();
        Schema::enableForeignKeyConstraints();

        Tag::factory(15)->create();
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create(['name' => $item]);
        }
        foreach (['#000000', '#FFFFFF', '#FF0000', '#00FF00', '#0000FF'] as $item) {
            ProductColor::query()->create(['name' => $item]);
        }
        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->text(100);
            Product::query()->create([
                'catalogue_id' => rand(1,5),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://canifa.com/img/1000/1500/resize/6/l/6ls24s009-sb001-l-1-ghep-u.webp',
                'price_regular' => 600000,
                'price_sale' => 490000,
            ]);
        }
        for ($i = 1; $i < 1001; $i++) {
            ProductGallery::query()->insert([
                ['product_id' => $i, 'image' => 'https://canifa.com/img/1000/1500/resize/6/l/6ls24s009-sb001-l-1-ghep-u.webp'],
                ['product_id' => $i, 'image' => 'https://canifa.com/img/1000/1500/resize/6/l/6ls23s009-db070-1.webp'],
            ]);
        }
        for ($i = 1; $i < 1001; $i++) {
            DB::table('product_tag')->insert([
                ['product_id' => $i, 'tag_id' => rand(1, 8)],
                ['product_id' => $i, 'tag_id' => rand(9, 15)],
            ]);
        }
        for ($productID = 1; $productID < 1001; $productID++) {
            $data = [];
            for ($sizeID = 1; $sizeID < 6; $sizeID++) {
                for ($colorID = 1; $colorID < 6; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_color_id' => $colorID,
                        'product_size_id' => $sizeID,
                        'quantity' => 100,
                        'image' => 'https://canifa.com/img/1000/1500/resize/6/l/6ls23s009-db070-1.webp',
                    ];
                }
            }
            DB::table('product_variant')->insert($data);
        }
    }
}
