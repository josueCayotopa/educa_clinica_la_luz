<?php

namespace App\Filament\Resources\FellowPreguntaResource\Pages;

use App\Filament\Resources\FellowPreguntaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFellowPreguntas extends ListRecords
{
    protected static string $resource = FellowPreguntaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
