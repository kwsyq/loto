<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class CustomerOverview extends Widget
{
    protected static string $view = 'filament.resources.customer-resource.widgets.customer-overview';

    public ?Model $record =null;

    protected function getHeaderWidgetsColumns(): int | array
    {
        return 1;
    }
}
