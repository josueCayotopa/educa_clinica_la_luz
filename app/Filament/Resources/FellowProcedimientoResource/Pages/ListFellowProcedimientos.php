<?php

namespace App\Filament\Resources\FellowProcedimientoResource\Pages;

use App\Filament\Resources\FellowProcedimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFellowProcedimientos extends ListRecords
{
    protected static string $resource = FellowProcedimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
