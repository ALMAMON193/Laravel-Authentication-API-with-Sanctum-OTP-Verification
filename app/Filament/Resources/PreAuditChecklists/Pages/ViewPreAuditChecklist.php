<?php

namespace App\Filament\Resources\PreAuditChecklists\Pages;

use App\Filament\Resources\PreAuditChecklists\PreAuditChecklistResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPreAuditChecklist extends ViewRecord
{
    protected static string $resource = PreAuditChecklistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
