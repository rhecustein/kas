<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CashTransaction;
use App\Models\SchoolMajor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            SchoolClassSeeder::class,
            SchoolMajorSeeder::class,
            UserSeeder::class,
            CashTransactionSeeder::class
        ]);
    }
}
