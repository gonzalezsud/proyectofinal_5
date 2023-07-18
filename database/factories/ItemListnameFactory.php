<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Listname;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemListname>
 */
class ItemListnameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "item_id" => Item::all()->random()->id,
           "listname_id" => Listname::all()->random()->id,
           "pieces" => fake()->numberBetween(1, 10) //
        ];
    }
}
