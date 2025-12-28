<?php

namespace App\Filament\Resources\Settlements\Pages;

use App\Filament\Resources\Settlements\SettlementResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\Model;

class ViewSettlement extends ViewRecord
{
    protected static string $resource = SettlementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->outlined(),
            Action::make('finalize')
                ->label(__('Selesaikan'))
                ->visible(fn ($record) => $record->status == 'in_progress')
                ->action(function ($record) {
                    $record->status = 'completed';
                    $record->save();
                    Notification::make()->title(__('Status berhasil diubah menjadi completed'))->success()->send();
                }),
            Action::make('print_form')
                ->visible(fn ($record) => $record->status == 'completed')
                ->url(fn (Model $record) => route('generate-pdf.form', $record))
                ->openUrlInNewTab(),
            Action::make('print_memo')
                ->visible(fn ($record) => $record->status == 'completed')
                ->url(fn (Model $record) => route('generate-pdf.memo', $record))
                ->openUrlInNewTab(),
        ];
    }
}
