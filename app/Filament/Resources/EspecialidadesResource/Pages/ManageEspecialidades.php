<?php

namespace App\Filament\Resources\EspecialidadesResource\Pages;

use App\Filament\Resources\EspecialidadesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEspecialidades extends ManageRecords
{
    protected static string $resource = EspecialidadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
