<?php

namespace App\Filament\Resources\FellowEvaluacionResource\Pages;

use App\Filament\Resources\FellowEvaluacionResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\FellowOpcion;

class EditFellowEvaluacion extends EditRecord
{
    protected static string $resource = FellowEvaluacionResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        [$total, $count] = $this->computeTotalsFromRepeater();
        $data['PUNTAJE_TOTAL'] = $total;
        $data['PROMEDIO']      = $count > 0 ? round($total / $count, 2) : 0;
        return $data;
    }

    private function computeTotalsFromRepeater(): array
    {
        $items = $this->form->getState()['respuestas'] ?? [];
        $sum = 0;
        $count = 0;

        foreach ($items as $r) {
            $val = $r['VALOR'] ?? null;
            if ($val === null && !empty($r['OPCION_ID'])) {
                $val = FellowOpcion::find($r['OPCION_ID'])?->VALOR;
            }
            $v = (int) ($val ?? 0);
            if ($v > 0) {
                $sum += $v;
                $count++;
            }
        }
        return [$sum, $count];
    }
    // app/Filament/Resources/FellowEvaluacionResource/Pages/EditFellowEvaluacion.php
    protected function afterSave(): void
    {
        $sum   = $this->record->respuestas()->where('VALOR', '>', 0)->sum('VALOR');
        $count = $this->record->respuestas()->where('VALOR', '>', 0)->count();

        $this->record->update([
            'PUNTAJE_TOTAL' => (float) $sum,
            'PROMEDIO'      => $count > 0 ? round($sum / $count, 2) : 0,
        ]);
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
