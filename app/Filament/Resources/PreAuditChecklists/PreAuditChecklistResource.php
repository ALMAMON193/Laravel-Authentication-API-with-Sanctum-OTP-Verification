<?php

namespace App\Filament\Resources\PreAuditChecklists;

use App\Filament\Resources\PreAuditChecklists\Pages\CreatePreAuditChecklist;
use App\Filament\Resources\PreAuditChecklists\Pages\EditPreAuditChecklist;
use App\Filament\Resources\PreAuditChecklists\Pages\ListPreAuditChecklists;
use App\Filament\Resources\PreAuditChecklists\Pages\ViewPreAuditChecklist;
use App\Filament\Resources\PreAuditChecklists\Schemas\PreAuditChecklistForm;
use App\Filament\Resources\PreAuditChecklists\Schemas\PreAuditChecklistInfolist;
use App\Filament\Resources\PreAuditChecklists\Tables\PreAuditChecklistsTable;
use App\Models\PreAuditChecklist;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PreAuditChecklistResource extends Resource
{
    protected static ?string $model = PreAuditChecklist::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function form(Schema $schema): Schema
    {
        return PreAuditChecklistForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PreAuditChecklistInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PreAuditChecklistsTable::configure($table);
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
            'index' => ListPreAuditChecklists::route('/'),
            'create' => CreatePreAuditChecklist::route('/create'),
            'view' => ViewPreAuditChecklist::route('/{record}'),
            'edit' => EditPreAuditChecklist::route('/{record}/edit'),
        ];
    }
}
