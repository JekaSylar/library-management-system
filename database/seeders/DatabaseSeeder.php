<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Workplace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
        ]);

        Workplace::factory(25)->create();


    }
}
