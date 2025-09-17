<?php

namespace App\Filament\Resources\PreAuditChecklistCategories\Pages;

use App\Filament\Resources\PreAuditChecklistCategories\PreAuditChecklistCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPreAuditChecklistCategory extends EditRecord
{
    protected static string $resource = PreAuditChecklistCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
