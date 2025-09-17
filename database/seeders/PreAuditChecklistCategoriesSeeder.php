<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreAuditChecklistCategoriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'EN 1090 Exc 2 & ISO9001 Profiling Pre-Audit Checklist',
            'EN 1090 Exc 2 & ISO9001 Stuctural Pre-Audit Checklist',
            'EN 1090 Exc 2 Profiling Pre-Audit Checklist',
            'EN 1090 Exc 2 Stuctural Pre-Audit Checklist',
            'EN 15085 WQMS Railway Pre-Audit Checklist',
            'ISO 9001 (Non EN1090) General Fabrication Pre-Audit Checklist',
            'ISO 9001 Example Generic Pre-Audit Checklist',
            'ISO 9001 Generic Company Pre-Audit Checklist',
            'ISO 14001 Enviromental Pre-Audit Check list',
            'ISO 45001 Occup Health & Safety Pre-Audit Checklist',
            'NHSS 20 Pre-Audit Checklist',
        ];

        foreach ($categories as $category) {
            DB::table('pre_audit_checklist_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
