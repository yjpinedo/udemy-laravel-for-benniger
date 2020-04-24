<?php

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
        // $this->call(UserSeeder::class);

        factory(App\User::class)->create([
            'name'      => 'yjpinedo',
            'email'     => 'admin@admin.com',
            'is_active' => 1,
        ]);

        factory(App\User::class, 40)->create();
    }
}
