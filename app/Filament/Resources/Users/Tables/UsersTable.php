<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament::resource.column.label.name'))
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->badge()
                    ->label(__('filament::resource.column.label.roles'))
                    ->formatStateUsing(fn (string $state): string => Str::headline($state))
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('filament::resource.column.label.email'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('national_id')
                    ->label(__('filament::resource.column.label.national_id'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->label(__('filament::resource.column.label.phone'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('mobile_phone_1')
                    ->label(__('filament::resource.column.label.mobile_phone_1'))
                    ->toggleable(),
                TextColumn::make('mobile_phone_2')
                    ->label(__('filament::resource.column.label.mobile_phone_2'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('account_verified_at')
                    ->label(__('filament::resource.column.label.email_verified_at'))
                    ->dateTime()
                    ->sortable()
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
