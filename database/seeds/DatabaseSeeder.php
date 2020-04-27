<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin', 
            'email' => 'admin@admin.com', 
            'password' => Hash::make('12345678'),
        ]);

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
            'image_url' => 'https://i.ibb.co/nnxtdP6/1.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Marinara',
            'description' => 'Tomato sauce, garlic and basil',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/gMBYhfx/2.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Quattro Stagioni',
            'description' => 'Tomato sauce, mozzarella, mushrooms, ham, artichokes, olives, and oregano',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/PFy5v6v/3.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Carbonara',
            'description' => 'Tomato sauce, mozzarella, parmesan, eggs, and bacon',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/XyBV8J0/4.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 5,
            'name' => 'Frutti di Mare',
            'description' => 'Tomato sauce and seafood',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/BnjXwHC/5.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 6,
            'name' => 'Quattro Formaggi',
            'description' => 'Tomato sauce, mozzarella, parmesan, gorgonzola cheese, artichokes, and oregano',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/jRRdr7V/6.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 7,
            'name' => 'Napoli',
            'description' => 'Tomato sauce, mozzarella, oregano, anchovies',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/WG2JHTy/7.jpg',
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'id' => 8,
            'name' => 'Pizza al Pesto',
            'description' => 'Tomato, mozzarella, Genoese pesto, pine nuts, and olives',
            'price' => 10.00,
            'image_url' => 'https://i.ibb.co/mDrFfhc/8.jpg',
            'category_id' => 1,
        ]);


        DB::table('products')->insert([
            'id' => 9,
            'name' => 'Blood & Sand',
            'description' => 'Scotch, sweet vermouth, Cherry Heering (the “blood”), and orange juice (the “sand”)',
            'price' => 5.00,
            'image_url' => 'https://static.vinepair.com/wp-content/uploads/2020/04/bloodandsand_internal-558x314.jpg',
            'category_id' => 2,
        ]);


        DB::table('products')->insert([
            'id' => 10,
            'name' => 'Sidecar',
            'description' => 'The drink mixes brandy, lemon, and triple sec, making a tart, refreshing tipple',
            'price' => 5.00,
            'image_url' => 'https://www.liquor.com/thmb/5b0I-kgT6qdIEBlGluo_dPE63lE=/960x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__liquor__2019__05__22111906__sidecar-720x720-recipe-4758380fb7ef4adfaafa21c3f4eed264.jpg',
            'category_id' => 2,
        ]);

    }
}
