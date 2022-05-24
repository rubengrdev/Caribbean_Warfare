<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'C-W Avatar', 'description' => 'This is the default avatar!', 'price' => 0, 'discount' => 0.0, 'category' => 'avatar', 'stock' => 9999, 'available' => true, 'image' => 'default.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blas de Lezo', 'description' => 'Blas de Lezo!', 'price' => 6.99, 'discount' => 0.0, 'category' => 'skin', 'stock' => 9999, 'available' => true, 'image' => 'media/img/skins/blas-de-lezo/blas-de-lezo-template-image-small-caribbean-warfare-render-skin-buy.png', 'created_at' => now(), 'updated_at' => now()]
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
