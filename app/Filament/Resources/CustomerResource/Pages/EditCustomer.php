<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;


class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;
    protected static ?string $title = 'Custom Page Title';
     
    protected static ?string $navigationLabel = 'Custom Navigation Label';
     
    protected static ?string $slug = 'custom-url-slug';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            \App\Filament\Resources\CustomerResource\Widgets\EmailList::class
        ];
    }

}
