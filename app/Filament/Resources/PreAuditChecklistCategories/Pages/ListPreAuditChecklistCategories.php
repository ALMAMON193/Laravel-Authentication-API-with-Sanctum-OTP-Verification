<?php

namespace App\Filament\Resources\PreAuditChecklistCategories\Pages;

use App\Filament\Resources\PreAuditChecklistCategories\PreAuditChecklistCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPreAuditChecklistCategories extends ListRecords
{
    protected static string $resource = PreAuditChecklistCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
