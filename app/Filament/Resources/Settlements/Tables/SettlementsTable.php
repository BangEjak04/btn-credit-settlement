<?php

namespace App\Filament\Resources\Settlements\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettlementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('filament::resource.column.label.debtor_name'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('debtor_number')
                    ->label(__('filament::resource.column.label.debtor_number'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('property_address')
                    ->label(__('filament::resource.column.label.property_address'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('loanType.name')
                    ->label(__('filament::resource.column.label.loan_type'))
                    ->toggleable(),
                TextColumn::make('realization_date')
                    ->label(__('filament::resource.column.label.realization_date'))
                    ->date()
                    ->toggleable(),
                TextColumn::make('remaining_outstanding')
                    ->label(__('filament::resource.column.label.remaining_outstanding'))
                    ->money(currency: 'IDR', decimalPlaces: 0)
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('filament::resource.column.label.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament::resource.column.label.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
