<?php

namespace App\Filament\Resources\PreAuditChecklists\Pages;

use App\Filament\Resources\PreAuditChecklists\PreAuditChecklistResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePreAuditChecklist extends CreateRecord
{
    protected static string $resource = PreAuditChecklistResource::class;
}
