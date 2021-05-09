<?php

namespace Database\Factories;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'folder_id' => $this->faker->numberBetween(1, Folder::count()),
            'title' => $this->faker->unique()->word(10),
            'expire' => $this->faker->dateTimeBetween('now', '+14 days'),
        ];
    }
}
