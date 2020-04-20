<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id' => 1,
            'name' => 'Pizza',
            'description' => 'Pizzas all flavors'
        ], [
            'id' => 2,
            'name' => 'Drinks',
            'description' => 'All available drinks'
        ]]);
        
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Margherita',
            'description' => 'Tomato sauce, mozzarella, and oregano',
            'price' => 10.00,
            'image_url' => '',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Marinara',
            'description' => 'Tomato sauce, garlic and basil',
            'price' => 10.00,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Quattro Stagioni',
            'description' => 'Tomato sauce, mozzarella, mushrooms, ham, artichokes, olives, and oregano',
            'price' => 10.00,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Carbonara',
            'description' => 'Tomato sauce, mozzarella, parmesan, eggs, and bacon',
            'price' => 10.00,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 5,
            'name' => 'Frutti di Mare',
            'description' => 'Tomato sauce and seafood',
            'price' => 10.00,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 6,
            'name' => 'Quattro Formaggi',
            'description' => 'Tomato sauce, mozzarella, parmesan, gorgonzola cheese, artichokes, and oregano',
            'price' => 10.00,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 7,
            'name' => 'Napoli',
            'description' => 'Tomato sauce, mozzarella, oregano, anchovies',
            'price' => 10.00,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 8,
            'name' => 'Pizza al Pesto',
            'description' => 'Tomato, mozzarella, Genoese pesto, pine nuts, and olives',
            'price' => 10.00,
            'category_id' => 1,
        ]);
    }
}
