<?php

namespace App\Filament\Resources\PreAuditChecklistCategories\Pages;

use App\Filament\Resources\PreAuditChecklistCategories\PreAuditChecklistCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPreAuditChecklistCategory extends ViewRecord
{
    protected static string $resource = PreAuditChecklistCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
