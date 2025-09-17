<?php

namespace Database\Seeders;

use App\Models\PreAuditChecklistCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call (FormTemplateSeeder::class);
        $this->call(PreAuditChecklistCategoriesSeeder::class);
    }
}
