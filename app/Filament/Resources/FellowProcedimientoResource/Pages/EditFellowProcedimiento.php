<?php

namespace App\Filament\Resources\FellowProcedimientoResource\Pages;

use App\Filament\Resources\FellowProcedimientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFellowProcedimiento extends EditRecord
{
    protected static string $resource = FellowProcedimientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
