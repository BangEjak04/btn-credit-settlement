<?php

namespace App\Filament\Widgets;

use Filament\Facades\Filament;
use Filament\Widgets\Widget;

class ProfileAlertWidget extends Widget
{
    protected string $view = 'filament.widgets.profile-alert-widget';

    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        $user = Filament::auth()->user();

        return empty($user->national_id) || empty($user->mobile_phone_1);
    }
}
