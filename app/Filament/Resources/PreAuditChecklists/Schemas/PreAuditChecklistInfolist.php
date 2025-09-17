<?php

namespace App\Filament\Resources\PreAuditChecklists\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PreAuditChecklistInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('preAuditChecklistCategory.name')
                    ->numeric(),
                TextEntry::make('procedure_no'),
                TextEntry::make('rec_no'),
                TextEntry::make('iso_clause'),
                TextEntry::make('action_with'),
                IconEntry::make('to_start')
                    ->boolean(),
                IconEntry::make('wip')
                    ->boolean(),
                IconEntry::make('complete')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
