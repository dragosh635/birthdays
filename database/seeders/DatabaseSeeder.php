<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dragos = User::factory()->create([
            'email' => 'dragos@mail.com',
        ]);

        $joey = User::factory()->create([
            'email' => 'joey@mail.com',
        ]);

        User::factory(10)->create([
            'parent' => $dragos->id,
        ]);

        User::factory(10)->create([
            'parent' => $joey->id,
        ]);
    }
}
