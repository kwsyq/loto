<?php

namespace App\Filament\Resources\SubscriberResource\Widgets;

use Closure;
use App\Models\Emails;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EmailList extends BaseWidget
{
    public ?Model $record =null;

    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Emails::query()->where('subscriber_id', $this->record["id"])->latest();
    }


    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('sent_numbers'),
            Tables\Columns\TextColumn::make('created_at'),
        ];
    }



}
