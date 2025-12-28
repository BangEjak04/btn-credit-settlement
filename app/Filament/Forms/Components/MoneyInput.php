<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;

class MoneyInput extends TextInput
{
    // protected string $view = 'filament.forms.components.money-input';

    protected function setUp(): void
    {
        parent::setUp();

        $this->prefix(__('filament::resource.column.prefix.price'))
            ->numeric()
            ->maxValue(9999999999999)
            ->minValue(-9999999999999)
            ->mask(RawJs::make(<<<'JS'
                $money($input, ',', '.', 2)
            JS))
            ->stripCharacters('.')
            ->extraAlpineAttributes([
                // Memastikan Alpine.js memproses mask dengan benar
                'x-on:blur' => '$el.value = $el.value',
            ]);
    }
}
