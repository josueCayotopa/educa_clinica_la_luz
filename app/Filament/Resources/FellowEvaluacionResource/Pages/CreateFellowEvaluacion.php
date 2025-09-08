<?php

namespace App\Filament\Resources\FellowEvaluacionResource\Pages;

use App\Filament\Resources\FellowEvaluacionResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\FellowOpcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateFellowEvaluacion extends CreateRecord
{
    protected static string $resource = FellowEvaluacionResource::class;


    protected function afterCreate(): void
    {
        // Asegura totales luego de que Filament guarde relaciones:
        $sum   = $this->record->respuestas()->where('VALOR', '>', 0)->sum('VALOR');
        $count = $this->record->respuestas()->where('VALOR', '>', 0)->count();

        $this->record->update([
            'PUNTAJE_TOTAL' => (float) $sum,
            'PROMEDIO'      => $count > 0 ? round($sum / $count, 2) : 0,
        ]);
        Log::info('[EVAL] Totales después de crear', [
            'eval_id' => $this->record->ID,
            'sum'     => $sum,
            'count'   => $count,
            'rows'    => $this->record->respuestas()->get(['PREGUNTA_ID', 'VALOR']),
        ]);
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Puntaje y % (ignora 0 = "No aplica")
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
            // Fallback: si VALOR no viene, derivarlo del OPcion elegido
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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
