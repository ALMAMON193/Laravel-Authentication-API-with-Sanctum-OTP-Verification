<?php

namespace App\Filament\Resources\PreAuditChecklists\Pages;

use App\Filament\Resources\PreAuditChecklists\PreAuditChecklistResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPreAuditChecklists extends ListRecords
{
    protected static string $resource = PreAuditChecklistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
