<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('filament::resource.column.label.name')),
                TextEntry::make('roles.name')
                    ->badge()
                    ->label(__('filament::resource.column.label.roles'))
                    ->formatStateUsing(fn (string $state): string => Str::headline($state)),
                TextEntry::make('email')
                    ->label(__('filament::resource.column.label.email')),
                TextEntry::make('email_verified_at')
                    ->label(__('filament::resource.column.label.email_verified_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('national_id')
                    ->label(__('filament::resource.column.label.national_id'))
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->label(__('filament::resource.column.label.phone'))
                    ->placeholder('-'),
                TextEntry::make('mobile_phone_1')
                    ->label(__('filament::resource.column.label.mobile_phone_1'))
                    ->placeholder('-'),
                TextEntry::make('mobile_phone_2')
                    ->label(__('filament::resource.column.label.mobile_phone_2'))
                    ->placeholder('-'),
                TextEntry::make('account_verified_at')
                    ->label(__('filament::resource.column.label.account_verified_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label(__('filament::resource.column.label.created_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('filament::resource.column.label.updated_at'))
                    ->dateTime()
                    ->placeholder('-'),
            ])
            ->columns(1);
    }
}
