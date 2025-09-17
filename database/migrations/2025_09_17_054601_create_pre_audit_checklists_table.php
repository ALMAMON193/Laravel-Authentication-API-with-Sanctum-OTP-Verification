<?php

use App\Models\PreAuditChecklistCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pre_audit_checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PreAuditChecklistCategory::class)->constrained();
            $table->string('procedure_no')->nullable();      // Procedure No
            $table->string('rec_no')->nullable();            // REC No
            $table->string('iso_clause')->nullable();        // ISO 9001 Clause
            $table->text('requirement')->nullable();         // Requirement
            $table->string('action_with')->nullable();       // Action with
            $table->text('notes')->nullable();               // Notes

            $table->boolean('to_start')->default(false);     // To Start
            $table->boolean('wip')->default(false);          // Work in Progress
            $table->boolean('complete')->default(false);     // Complete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_audit_checklists');
    }
};
