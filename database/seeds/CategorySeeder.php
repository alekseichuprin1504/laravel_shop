<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Мобильные телефоны',
                'slug' => 'Mobile_phones',
                'status' => 1
            ],
            [
                'name' => 'Бытовая техника',
                'slug' => 'equipment',
                'status' => 1
            ],
            [
                'name' => 'Компьютеры',
                'slug' => 'computers',
                'status' => 1
            ],
            [
                'name' => 'Фото',
                'slug' => 'photos',
                'status' => 1

            ],
            [
                'name' => 'Товары для дома',
                'slug' => 'home',
                'status' => 1

            ],
            [
                'name' => 'Электротранспорт',
                'slug' => 'transport',
                'status' => 1

            ]
        ]);
    }
}
