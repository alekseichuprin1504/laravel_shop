<?php

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
        DB::table('products')->insert([
            [
                'name' => 'samsung J120',
                'slug' => 'samsung_J120',
                'category_id' => 1,
                'code' => 4425,
                'price' => 2199,
                'image' => 'product3.jpg',
                'description' => 'some desc',
                'status' => 1
            ],
            [
                'name' => 'iphone6',
                'slug' => 'iphone_6',
                'category_id' => 1,
                'code' => 44253,
                'price' => 6999,
                'image' => 'product2.jpg',
                'description' => 'some desc2',
                'status' => 1
            ],
            [
                'name' => 'Intel',
                'slug' => 'Intel_1',
                'category_id' => 3,
                'code' => 14425,
                'price' => 4199,
                'image' => 'product2.jpg',
                'description' => 'some desc3',
                'status' => 1
            ],
            [
                'name' => 'samsung J320',
                'slug' => 'samsung_J320',
                'category_id' => 1,
                'code' => 12301,
                'price' => 2599,
                'image' => 'product1.jpg',
                'description' => 'some desc4',
                'status' => 1

            ],
            [
                'name' => 'samsung J330',
                'slug' => 'samsung_J330',
                'category_id' => 1,
                'code' => 4425343,
                'price' => 1099,
                'image' => 'product3.jpg',
                'description' => 'some desc5',
                'status' => 1
            ],
            [
                'name' => 'Automoto',
                'slug' => 'Auto_moto',
                'category_id' => 6,
                'code' => 446625,
                'price' => 10199,
                'image' => 'product3.jpg',
                'description' => 'some desc6',
                'status' => 1
            ]
        ]);
    }
}
