<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemListname;
use App\Models\Listname;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // arreglo con todas las categorias    
        $categories = ["Fruits and vegetables", "Meat and fish", "Beverages"];
        
        // inseto cada elemento del areglo en la tabla categorias 

        foreach ($categories as $category) {
            DB::table("categories")->insert([
                "name" => $category
            ]);
        } 
            // ejecuto los factory que crea los items 
            Item::factory(15)->create();
            // ejecuto el factory que crea los nombres de las listas
            Listname::factory(5)->create();

            // ejecuto el factory que crea los item relacionados a las listas
            ItemListname::factory(15)->create();
    }
}
