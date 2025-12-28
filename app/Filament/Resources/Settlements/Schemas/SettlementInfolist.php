<?php

namespace App\Filament\Resources\Settlements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class SettlementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('status')
                    ->label(__('filament::resource.column.label.status'))
                    ->formatStateUsing(fn (string $state): string => __("filament::resource.option.status.{$state}"))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                TextEntry::make('user.name')
                    ->label(__('filament::resource.column.label.name'))
                    ->weight('bold')
                    ->size(TextSize::Large),
                TextEntry::make('user.national_id')
                    ->label(__('filament::resource.column.label.national_id'))
                    ->placeholder('-'),
                TextEntry::make('debtor_number')
                    ->label(__('filament::resource.column.label.debtor_number'))
                    ->placeholder('-'),
                TextEntry::make('property_address')
                    ->label(__('filament::resource.column.label.property_address'))
                    ->placeholder('-'),
                TextEntry::make('user.phone')
                    ->label(__('filament::resource.column.label.phone'))
                    ->placeholder('-'),
                TextEntry::make('user.mobile_phone_1')
                    ->label(__('filament::resource.column.label.mobile_phone_1'))
                    ->placeholder('-'),
                TextEntry::make('user.mobile_phone_2')
                    ->label(__('filament::resource.column.label.mobile_phone_2'))
                    ->placeholder('-'),

                TextEntry::make('settlement_reason')
                    ->label(__('filament::resource.column.label.settlement_reason'))
                    ->placeholder('-'),
                TextEntry::make('destination_bank')
                    ->label(__('filament::resource.column.label.destination_bank'))
                    ->placeholder('-'),
                TextEntry::make('take_over_reason')
                    ->label(__('filament::resource.column.label.take_over_reason'))
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'take_over_bank' => 'Take Over ke Bank Lain',
                        'non_take_over' => 'Non Take Over',
                        'transfer_debtor' => 'Alih Debitur',
                        default => $state
                    })
                    ->placeholder('-'),
                TextEntry::make('take_over_interest_rate')
                    ->label(__('filament::resource.column.label.take_over_interest_rate'))
                    ->placeholder('-')
                    ->suffix('%'),

                TextEntry::make('remaining_outstanding')
                    ->label(__('filament::resource.column.label.remaining_outstanding'))
                    ->money(currency: 'IDR', decimalPlaces: 0)
                    ->placeholder('-'),
                TextEntry::make('penalty_rate')
                    ->label(__('filament::resource.column.label.penalty_rate'))
                    ->suffix('%')
                    ->placeholder('-'),
                TextEntry::make('accrued_interest')
                    ->label(__('filament::resource.column.label.accrued_interest'))
                    ->money(currency: 'IDR', decimalPlaces: 0)
                    ->placeholder('-'),
                TextEntry::make('current_fines')
                    ->label(__('filament::resource.column.label.current_fines'))
                    ->money(currency: 'IDR', decimalPlaces: 0)
                    ->placeholder('-'),
                TextEntry::make('fine_obligation')
                    ->label(__('filament::resource.column.label.fine_obligation'))
                    ->money(currency: 'IDR', decimalPlaces: 0)
                    ->placeholder('-'),
                TextEntry::make('total_settlement')
                    ->label(__('filament::resource.column.label.total_settlement'))
                    ->money(currency: 'IDR', decimalPlaces: 0)
                    ->weight('bold')
                    ->color('primary')
                    ->size(TextSize::Large)
                    ->placeholder('-'),

                TextEntry::make('loanType.name')
                    ->label(__('filament::resource.column.label.loan_type'))
                    ->weight('bold')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('realization_date')
                    ->label(__('filament::resource.column.label.realization_date'))
                    ->date()
                    ->weight('bold')
                    ->size(TextSize::Large)
                    ->placeholder('-'),

                TextEntry::make('created_at')
                    ->label(__('filament::resource.column.label.created_at'))
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label(__('filament::resource.column.label.updated_at'))
                    ->dateTime(),
            ])
            ->columns(1);
    }
}
