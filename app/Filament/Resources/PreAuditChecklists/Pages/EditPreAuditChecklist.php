<?php

namespace App\Filament\Resources\PreAuditChecklists\Pages;

use App\Filament\Resources\PreAuditChecklists\PreAuditChecklistResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPreAuditChecklist extends EditRecord
{
    protected static string $resource = PreAuditChecklistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
