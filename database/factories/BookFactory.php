<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word;
        $author = $this->faker->word;
        return [
            'name'=>$name,
            'author'=>$author,
            'CoverImg'=>basename($this->faker->image(storage_path(path:'app/public'))),
            
        ];
    }
}
