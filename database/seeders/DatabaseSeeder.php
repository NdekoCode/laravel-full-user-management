<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Models\Role::factory(4)->create();
        \App\Models\User::factory(50)->create();
        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(($roles->random(1)->first())->id);
        });
    }
}
