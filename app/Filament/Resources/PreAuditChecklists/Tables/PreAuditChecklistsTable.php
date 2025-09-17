<?php

namespace App\Filament\Resources\PreAuditChecklists\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PreAuditChecklistsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('preAuditChecklistCategory.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('procedure_no')
                    ->searchable(),
                TextColumn::make('rec_no')
                    ->searchable(),
                TextColumn::make('iso_clause')
                    ->searchable(),
                TextColumn::make('action_with')
                    ->searchable(),
                IconColumn::make('to_start')
                    ->boolean(),
                IconColumn::make('wip')
                    ->boolean(),
                IconColumn::make('complete')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
