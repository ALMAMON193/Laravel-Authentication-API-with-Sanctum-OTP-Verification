<?php

use App\Models\FormTemplate;
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
        Schema::create('form_builds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor (FormTemplate::class)->constrained();
            // Field Properties
            $table->string('field_label');
            $table->string('field_name');
            $table->enum('field_type', [
                'text','textarea','number','select','checkbox','radio','date','email','file'
            ]);

            // Validation & Rules
            $table->json('field_options')->nullable();
            $table->boolean('is_required')->default(false);
            $table->string('validation_rules')->nullable();
            $table->string('default_value')->nullable();

            // UI / Display
            $table->integer('order')->default(0);
            $table->boolean('is_visible')->default(true);
            // Extra Meta
            $table->string('placeholder')->nullable();
            $table->text('help_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_builds');
    }
};
