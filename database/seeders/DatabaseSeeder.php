<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
                'name' => 'Admin E-Commerce',
                'email' => 'admin@e-commerce.test',
                'password' => bcrypt('admin'),
                'role' => UserRole::ADMIN,
            ],
            [
                'name' => 'Nouval Trezandy',
                'email' => 'nouval@gmail.com',
                'password' => bcrypt('password'),
                'role' => UserRole::CUSTOMER,
            ],
        ]);

        // Panggil seeder yang dibuat
        $this->call([
            ProductAndCategorySeeder::class,
            ProductVariantSeeder::class,
        ]);
    }
}
