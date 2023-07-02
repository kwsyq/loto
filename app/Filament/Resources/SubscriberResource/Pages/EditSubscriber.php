<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use App\Filament\Resources\SubscriberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscriber extends EditRecord
{
    protected static string $resource = SubscriberResource::class;
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
            \App\Filament\Resources\SubscriberResource\Widgets\EmailList::class
        ];
    }    
}
