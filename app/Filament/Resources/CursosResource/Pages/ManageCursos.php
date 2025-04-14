<?php

namespace App\Filament\Resources\CursosResource\Pages;

use App\Filament\Resources\CursosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCursos extends ManageRecords
{
    protected static string $resource = CursosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
