<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'name' => 'apple 69',
                'details' => '69gb',
                'description' => 'This is a sample description just for testing im apple 69 with 69 gb or rom',
                'price' => '6969',
                'shipping_cost' => '25',
                'image_path' => 'storage/product.png' 
            ], 
            [
                'name' => 'samsung 420',
                'details' => '4 gb ram 20 gb rom',
                'description' => 'i am samsung 420 im just an example product for testing purposes.',
                'price' => '420',
                'shipping_cost' => '25',
                'image_path' => 'storage/product2.png' 
            ],
        ];

        foreach($product as $key => $value){
            Product::create($value);
        }
    }
}
