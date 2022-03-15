<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::where('email', 'admin@admin.com')->first();

        if (!$user) {
            \App\Models\User::factory(1)->create([
                'name' => 'admin ',
                'email' => 'admin@admin.com',
            ]);
        }

        \App\Models\User::factory(5)->create();
        \App\Models\Message::factory(100)->create();
    }
}
