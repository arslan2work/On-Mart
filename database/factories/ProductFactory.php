<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence( 3 , false ),
            'slug' => $this->faker->unique()->slug,
            'summary' => $this->faker->text,
            'description' => $this->faker->paragraphs(3,true),
            'additional_info' => $this->faker->paragraphs(3,true),
            'return_cancellation' => $this->faker->paragraphs(3,true),
            'stock' => $this->faker->numberBetween(2 , 10),
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'cat_id' => $this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id' => $this->faker->randomElement(Category::where('is_parent', 0)->pluck('id')->toArray()),
            'photo' => $this->faker->imageUrl( '400', '500'),
            'size_guide' => $this->faker->imageUrl( '80', '80'),
            'price' => $this->faker->numberBetween( 100, 1000),
            'offer_price' => $this->faker->numberBetween( 100, 1000),
            'discount' => $this->faker->numberBetween( 10, 2),
            'size' => $this->faker->randomElement(['S', 'M', 'L']),
            'conditions' => $this->faker->randomElement(['new', 'popular', 'winter']),
            'added_by' => 'admin',

            'status' => $this->faker->randomElement(['active', 'inactive']),

        ];
    }
}
