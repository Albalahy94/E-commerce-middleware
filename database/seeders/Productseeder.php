<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '3000',
                'category' => 'lab',
                'gallary' => 'images/products/l1.png',

            ],
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '4000',
                'category' => 'lab',
                'gallary' => 'images/products/l1.png',

            ],

            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '5000',
                'category' => 'lab',
                'gallary' => 'images/products/l1.png',

            ],
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '6000',
                'category' => 'lab',
                'gallary' => 'images/products/l1.png',

            ],
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '7000',
                'category' => 'lab',
                'gallary' => 'images/products/l2.png',

            ],
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '8000',
                'category' => 'lab',
                'gallary' => 'images/products/l2.png',

            ],
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '9000',
                'category' => 'lab',
                'gallary' => 'images/products/l2.png',

            ],
            [
                'name' => 'laptop',
                'description' => 'laptop',
                'price'  => '10000',
                'category' => 'lab',
                'gallary' => 'images/products/l2.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '3000',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'tablet',
                'description' => 'tablet',
                'price'  => '2500',
                'category' => 'tab',
                'gallary' => 'images/products/t1.png',

            ],
            [
                'name' => 'hand phone',
                'description' => 'hand',
                'price'  => '300',
                'category' => 'accessories',
                'gallary' => 'images/products/h1.png',

            ],
            [
                'name' => 'hand phone',
                'description' => 'hand',
                'price'  => '350',
                'category' => 'accessories',
                'gallary' => 'images/products/h1.png',

            ],

            [
                'name' => 'hand phone',
                'description' => 'hand',
                'price'  => '400',
                'category' => 'accessories',
                'gallary' => 'images/products/h1.png',

            ],

            [
                'name' => 'hand phone',
                'description' => 'hand',
                'price'  => '450',
                'category' => 'accessories',
                'gallary' => 'images/products/h1.png',

            ],
            [
                'name' => 'hand phone',
                'description' => 'hand',
                'price'  => '500',
                'category' => 'accessories',
                'gallary' => 'images/products/h1.png',

            ],



        ]);
    }
}