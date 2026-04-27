<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        $categories = [
            'Чехлы',
            'Наушники',
            'Зарядки',
            'Кабели',
            'Power Bank',
        ];

        foreach ($categories as $categoryName) {
            Category::updateOrCreate(
                ['slug' => Str::slug($categoryName)],
                [
                    'name' => $categoryName,
                    'slug' => Str::slug($categoryName),
                ]
            );
        }

        $items = [
            [
                'category' => 'Чехлы',
                'name' => 'Чехол Silicone Case',
                'description' => 'Мягкий силиконовый чехол для смартфона.',
                'price' => 990,
                'quantity' => 15,
                'image' => 'images/products/silicone-case.png',
            ],
            [
                'category' => 'Чехлы',
                'name' => 'Прозрачный чехол Clear',
                'description' => 'Прозрачный защитный чехол для смартфона.',
                'price' => 690,
                'quantity' => 20,
                'image' => 'images/products/clear-case.png',
            ],
            [
                'category' => 'Наушники',
                'name' => 'Беспроводные наушники AirSound',
                'description' => 'Беспроводные наушники с зарядным кейсом.',
                'price' => 3490,
                'quantity' => 10,
                'image' => 'images/products/airsound.png',
            ],
            [
                'category' => 'Наушники',
                'name' => 'Проводные наушники MiniJack',
                'description' => 'Классические проводные наушники с разъёмом MiniJack.',
                'price' => 790,
                'quantity' => 25,
                'image' => 'images/products/minijack.png',
            ],
            [
                'category' => 'Зарядки',
                'name' => 'Быстрая зарядка FastCharge',
                'description' => 'Сетевое зарядное устройство с поддержкой быстрой зарядки.',
                'price' => 1290,
                'quantity' => 18,
                'image' => 'images/products/charger.png',
            ],
            [
                'category' => 'Кабели',
                'name' => 'Кабель USB-C',
                'description' => 'Кабель USB-C для зарядки и передачи данных.',
                'price' => 490,
                'quantity' => 30,
                'image' => 'images/products/cable.png',
            ],
            [
                'category' => 'Power Bank',
                'name' => 'Power Bank 10000 mAh',
                'description' => 'Портативный аккумулятор для зарядки смартфона.',
                'price' => 2490,
                'quantity' => 12,
                'image' => 'images/products/powerbank.png',
            ],
            [
                'category' => 'Power Bank',
                'name' => 'Держатель для телефона',
                'description' => 'Удобный автомобильный держатель для смартфона.',
                'price' => 890,
                'quantity' => 16,
                'image' => 'images/products/holder.png',
            ],
        ];

        foreach ($items as $item) {
            $category = Category::where('name', $item['category'])->first();

            Product::updateOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'category_id' => $category->id,
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'image' => $item['image'],
                    'is_active' => true,
                ]
            );
        }
    }
}