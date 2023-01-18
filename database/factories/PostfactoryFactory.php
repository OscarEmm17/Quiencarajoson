<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostfactoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
                // Creamos un registro de tipo text e indicamos el numero de caracteres
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1,2]),
                    // Cargamos lo del model category, elige un registro al asar y obtenemos el id
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->randow()->id,
        ];
    }
}
