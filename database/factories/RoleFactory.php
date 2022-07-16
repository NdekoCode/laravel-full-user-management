<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rolesUser = [
            'user' => ['name' => 'user', 'priority' => 1],
            'editor' => ['name' => 'editor', 'priority' => 2],
            'admin' => ['name' => 'admin', 'priority' => 3],
            'super_admin' => ['name' => 'super_admin', 'priority' => 4]
        ];
        $roles = ['user', 'editor', 'admin', 'super_admin'];
        $id = $this->faker->numberBetween(0, 3);
        return [
            'name' => $rolesUser[$roles[$id]]['name'],
            'priority' => $rolesUser[$roles[$id]]['priority']
        ];
    }
}
