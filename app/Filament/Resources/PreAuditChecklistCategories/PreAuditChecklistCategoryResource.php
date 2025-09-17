<?php

namespace App\Filament\Resources\PreAuditChecklistCategories;

use App\Filament\Resources\PreAuditChecklistCategories\Pages\CreatePreAuditChecklistCategory;
use App\Filament\Resources\PreAuditChecklistCategories\Pages\EditPreAuditChecklistCategory;
use App\Filament\Resources\PreAuditChecklistCategories\Pages\ListPreAuditChecklistCategories;
use App\Filament\Resources\PreAuditChecklistCategories\Pages\ViewPreAuditChecklistCategory;
use App\Filament\Resources\PreAuditChecklistCategories\Schemas\PreAuditChecklistCategoryForm;
use App\Filament\Resources\PreAuditChecklistCategories\Schemas\PreAuditChecklistCategoryInfolist;
use App\Filament\Resources\PreAuditChecklistCategories\Tables\PreAuditChecklistCategoriesTable;
use App\Models\PreAuditChecklistCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PreAuditChecklistCategoryResource extends Resource
{
    protected static ?string $model = PreAuditChecklistCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function form(Schema $schema): Schema
    {
        return PreAuditChecklistCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PreAuditChecklistCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PreAuditChecklistCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPreAuditChecklistCategories::route('/'),
            'create' => CreatePreAuditChecklistCategory::route('/create'),
            'view' => ViewPreAuditChecklistCategory::route('/{record}'),
            'edit' => EditPreAuditChecklistCategory::route('/{record}/edit'),
        ];
    }
}
