<?php

namespace App\Filament\Resources\FellowEvaluacionResource\Pages;

use App\Filament\Resources\FellowEvaluacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFellowEvaluacions extends ListRecords
{
    protected static string $resource = FellowEvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
