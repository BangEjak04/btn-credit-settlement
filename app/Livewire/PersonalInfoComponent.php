<?php

namespace App\Livewire;

use Filament\Forms;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo as BreezyPersonalInfo;

class PersonalInfoComponent extends BreezyPersonalInfo
{
    public array $only = ['username', 'name', 'email', 'national_id', 'phone', 'mobile_phone_1', 'mobile_phone_2'];

    protected function getProfileFormComponents(): array
    {
        return [
            $this->getNameComponent(),
            $this->getEmailComponent(),
            $this->getNationalIdComponent(),
            $this->getPhoneComponent(),
            $this->getMobilePhoneComponent('mobile_phone_1')->required(),
            $this->getMobilePhoneComponent('mobile_phone_2'),
            // $this->getBankAccountIdComponent(),
        ];
    }

    protected function getNationalIdComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('national_id')
            ->label(__('filament::resource.column.label.national_id'))
            ->required();
    }

    protected function getPhoneComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('phone')
            ->label(__('filament::resource.column.label.phone'))
            ->tel();
    }

    protected function getMobilePhoneComponent(string $column): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make($column)
            ->label(__("filament::resource.column.label.{$column}"))
            ->tel();
    }

    protected function getBankAccountIdComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('bank_account_id')
            ->label(__("filament::resource.column.label.bank_account"))
            ->numeric()
            ->required();
    }
}
