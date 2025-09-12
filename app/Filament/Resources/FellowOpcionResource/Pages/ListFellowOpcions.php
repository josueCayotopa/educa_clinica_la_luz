<?php

namespace App\Filament\Resources\FellowOpcionResource\Pages;

use App\Filament\Resources\FellowOpcionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFellowOpcions extends ListRecords
{
    protected static string $resource = FellowOpcionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
