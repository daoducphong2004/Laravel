<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<10;$i++){
            $name= fake()->text(100);
            Product::query()->create([
                'catalogue_id'=>rand(2,7),
                'name'=> $name,
                'slug'=>Str::slug($name).'-'. Str::random(8),
                'sku'=>Str::random(8).$i,
                'img_thumbnail'=>'https://canifa.com/img/1000/1500/resize/6/l/6ls24s009-sb001-l-1-ghep-u.webp',
                'price_regular'=>600000,
                'price_sale'=>490000,
            ]);
        }
    }
}
