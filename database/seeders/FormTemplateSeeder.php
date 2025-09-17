<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Controlled Document Register',
                'slug' => 'controlled-document-register',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Personnel Structure & Responsibilities',
                'slug' => 'personnel-structure-responsibilities',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Training & Competence Register',
                'slug' => 'training-competence-register',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Toolbox Talks & Meetings',
                'slug' => 'toolbox-talks-meetings',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Maintenance & Calibration',
                'slug' => 'maintenance-calibration',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Inspection & Test Plan (ITP)',
                'slug' => 'inspection-test-plan-itp',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Welding Specifications and Qualification',
                'slug' => 'welding-specifications-qualification',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Job Card & Project Review',
                'slug' => 'job-card-project-review',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Approved Supplier Register',
                'slug' => 'approved-supplier-register',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Purchase Order',
                'slug' => 'purchase-order',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Delivery Note',
                'slug' => 'delivery-note',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Declaration of Performance (DoP)',
                'slug' => 'declaration-of-performance-dop',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Compliance Register',
                'slug' => 'compliance-register',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Internal Audit',
                'slug' => 'internal-audit',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Management + Objectives + Risks Meeting',
                'slug' => 'management-objectives-risks-meeting',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
            [
                'name' => 'Aspects, Hazards, and Impacts Register',
                'slug' => 'aspects-hazards-impacts-register',
                'image_url' => 'backend/img/customer/profile5.jpg'
            ],
        ];

        foreach ($templates as $template) {
            DB::table('form_templates')->insert([
                'name' => $template['name'],
                'slug' => $template['slug'],
                'image_url' => $template['image_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
