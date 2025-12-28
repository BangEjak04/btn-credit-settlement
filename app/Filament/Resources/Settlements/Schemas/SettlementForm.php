<?php

namespace App\Filament\Resources\Settlements\Schemas;

use App\Filament\Forms\Components\MoneyInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettlementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament::resource.form.section.debtor_information'))
                    ->schema([
                        Select::make('user_id')
                            ->label(__('filament::resource.column.label.debtor'))
                            ->relationship('user', 'name')
                            ->searchable(['name', 'national_id', 'debtor_number'])
                            ->searchDebounce(500)
                            ->disabledOn('edit')
                            ->required(),
                        TextInput::make('debtor_number')
                            ->label(__('filament::resource.column.label.debtor_number'))
                            ->required(),
                        Textarea::make('property_address')
                            ->label(__('filament::resource.column.label.property_address'))
                            ->required(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
                Section::make(__('filament::resource.form.section.credit_detail'))
                    ->schema([
                        Select::make('settlement_reason')
                            ->label(__('filament::resource.column.label.settlement_reason'))
                            ->options([
                                'take_over_bank' => 'Take Over ke Bank Lain',
                                'non_take_over' => 'Non Take Over',
                                'transfer_debtor' => 'Alih Debitur',
                            ]),
                        Select::make('loan_type_id')
                            ->label(__('filament::resource.column.label.loan_type'))
                            ->relationship('loanType', 'name')
                            ->required(),
                        Select::make('destination_bank')
                            ->label(__('filament::resource.column.label.destination_bank'))
                            ->options([
                                'BCA' => 'BCA',
                                'Mandiri' => 'Mandiri',
                                'BNI' => 'BNI',
                                'BRI' => 'BRI',
                                'Lainnya' => 'Bank Lainnya',
                            ]),
                        Textarea::make('take_over_reason')
                            ->label(__('filament::resource.column.label.take_over_reason')),
                        TextInput::make('take_over_interest_rate')
                            ->label(__('filament::resource.column.label.take_over_interest_rate'))
                            ->numeric()
                            ->minValue(-999999)
                            ->maxValue(999999)
                            ->suffix('%'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
                Section::make(__('filament::resource.form.section.finance_detail'))
                    ->schema([
                        MoneyInput::make('remaining_outstanding')
                            ->label(__('filament::resource.column.label.remaining_outstanding'))
                            ->required(),
                        TextInput::make('penalty_rate')
                            ->label(__('filament::resource.column.label.penalty_rate'))
                            ->numeric()
                            ->minValue(-999999)
                            ->maxValue(999999)
                            ->suffix('%')
                            ->required(),
                        MoneyInput::make('accrued_interest')
                            ->label(__('filament::resource.column.label.accrued_interest'))
                            ->required(),
                        MoneyInput::make('current_fines')
                            ->label(__('filament::resource.column.label.current_fines'))
                            ->required(),
                        MoneyInput::make('fine_obligation')
                            ->label(__('filament::resource.column.label.fine_obligation'))
                            ->required(),
                        MoneyInput::make('total_settlement')
                            ->label(__('filament::resource.column.label.total_settlement'))
                            ->required(),
                        DatePicker::make('realization_date')
                            ->label(__('filament::resource.column.label.realization_date'))
                            ->required(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
