<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreAuditChecklist extends Model
{

    protected $table = 'pre_audit_checklists';

    // Fillable fields
    protected $fillable = [
        'pre_audit_checklist_category_id',
        'procedure_no',
        'rec_no',
        'iso_clause',
        'requirement',
        'action_with',
        'notes',
        'to_start',
        'wip',
        'complete',
    ];

    // Cast boolean fields
    protected $casts = [
        'to_start' => 'boolean',
        'wip' => 'boolean',
        'complete' => 'boolean',
    ];
    //relation pre audit checklist category

    public function preAuditChecklistCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PreAuditChecklistCategory::class);
    }
}
