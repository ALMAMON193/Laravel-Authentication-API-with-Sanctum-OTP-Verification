<?php

namespace App\Filament\Resources\PreAuditChecklists\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PreAuditChecklistForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pre_audit_checklist_category_id')
                    ->relationship('preAuditChecklistCategory', 'name')
                    ->required(),
                TextInput::make('procedure_no'),
                TextInput::make('rec_no'),
                TextInput::make('iso_clause'),
                Textarea::make('requirement')
                    ->columnSpanFull(),
                TextInput::make('action_with'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Toggle::make('to_start')
                    ->required(),
                Toggle::make('wip')
                    ->required(),
                Toggle::make('complete')
                    ->required(),
            ]);
    }
}
