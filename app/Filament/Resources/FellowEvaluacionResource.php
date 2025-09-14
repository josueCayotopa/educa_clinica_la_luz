<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FellowEvaluacionResource\Pages;
use App\Models\FellowEvaluacion;
use App\Models\FellowProcedimiento;
use App\Models\FellowPregunta;
use App\Models\FellowOpcion;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FellowEvaluacionResource extends Resource
{
    protected static ?string $model = FellowEvaluacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    // protected static ?string $navigationGroup = 'Fellows';
    protected static ?string $navigationLabel = 'Evaluaciones';
    protected static ?string $modelLabel = 'Evaluacion';
    protected static ?string $pluralModelLabel = 'Evaluaciones';

    /** Limita lo que se lista según TIPO_EVALUADOR_FELLOW (OWN/ALL) */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $u = Auth::user();

        $canAll = strtoupper((string)($u->TIPO_EVALUADOR_FELLOW ?? 'OWN')) === 'ALL'
            || ($u->type ?? null) === 'admin';

        if (!$canAll) {
            $query->where(function ($q) use ($u) {
                if (Schema::hasColumn('FELLOW_EVALUACIONES', 'RESIDENTE_ID')) {
                    $q->where('RESIDENTE_ID', $u->id);
                } else {
                    $q->where('RESIDENTE', $u->name ?? $u->usuario ?? '');
                }
            });
        }
        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Datos de la evaluación')
                ->description('Complete la información general antes de pasar a los pasos.')
                ->icon('heroicon-o-clipboard-document-check')
                ->collapsible()
                ->schema([
                    Select::make('PROCEDIMIENTO_ID')
                        ->label('Técnica quirúrgica')
                        ->options(fn() => FellowProcedimiento::query()
                            ->where('ACTIVO', '1')->orderBy('NOMBRE')->pluck('NOMBRE', 'ID'))
                        ->reactive()
                        ->required()
                        ->afterStateUpdated(function ($state, Set $set) {
                            if (!$state) {
                                $set('respuestas', []);
                                // limpiar “copiar de” si lo usas
                                $set('COPIAR_DE', null);
                                return;
                            }

                            // Carga solo el esqueleto — SIN copiar ninguna evaluación previa
                            $pregs = FellowPregunta::query()
                                ->where('PROCEDIMIENTO_ID', $state)
                                ->where('ACTIVO', '1')
                                ->orderBy('ORDEN')
                                ->get(['ID']);

                            $set('respuestas', $pregs->map(fn($p) => [
                                'PREGUNTA_ID' => $p->ID,
                                'OPCION_ID'   => null,
                                'VALOR'       => null,
                                'OBSERVACION' => null,
                            ])->toArray());

                            // (Opcional) limpiar select “Copiar de”
                            $set('COPIAR_DE', null);
                        }),


                    // Nombre visible del residente (texto) + ID oculto

                    Placeholder::make('RESIDENTE_LABEL')
                        ->label('Fellow / Residente')
                        ->content(function (Get $get) {
                            $id = $get('RESIDENTE_ID') ?: auth()->id();
                            $user = \App\Models\User::find($id);
                            return $user?->name ?? $user?->usuario ?? '—';
                        })
                        ->columnSpan(1),

                    DatePicker::make('FECHA_EVALUACION')->label('Fecha')->required(),
                    Textarea::make('OBSERVACIONES')->label('Comentarios')->rows(3),

                    Hidden::make('RESIDENTE_ID')
                        ->default(fn() => Auth::id())
                        ->hidden(fn() => !Schema::hasColumn('FELLOW_EVALUACIONES', 'RESIDENTE_ID')),
                ])->columns(2),

            Section::make('Historial del residente (últimas 10)')
                ->visible(fn(Get $get) => filled($get('PROCEDIMIENTO_ID')))
                ->schema([
                    Forms\Components\Placeholder::make('historial_html')
                        ->label('')
                        ->content(function (Get $get) {
                            $procId = $get('PROCEDIMIENTO_ID');
                            if (!$procId) return 'Seleccione un procedimiento.';

                            $q = FellowEvaluacion::query()
                                ->where('PROCEDIMIENTO_ID', $procId)
                                ->orderByDesc('FECHA_EVALUACION')
                                ->orderByDesc('ID')
                                ->limit(10);

                            if (Schema::hasColumn('FELLOW_EVALUACIONES', 'RESIDENTE_ID')) {
                                $q->where('RESIDENTE_ID', Auth::id());
                            } else {
                                $nom = Auth::user()->name ?? Auth::user()->NOM_USUARIO ?? Auth::user()->usuario ?? '';
                                if ($nom) $q->where('RESIDENTE', $nom);
                            }

                            // ⬅️ Trae PROMEDIO (y ID para fallback)
                            $rows = $q->get(['ID', 'FECHA_EVALUACION', 'PUNTAJE_TOTAL', 'PROMEDIO']);
                            if ($rows->isEmpty()) return new HtmlString('No hay evaluaciones previas para este procedimiento.');

                            // Fallback: si alguna fila no tiene PROMEDIO, calcularlo en caliente (máx 10 filas → costo OK)
                            foreach ($rows as $r) {
                                if ($r->PROMEDIO === null) {
                                    $avg = DB::table('FELLOW_EVAL_RESPUESTAS')
                                        ->where('EVALUACION_ID', $r->ID)
                                        ->where('VALOR', '>', 0)
                                        ->avg('VALOR');
                                    $r->PROMEDIO = $avg !== null ? (float) $avg : null;
                                }
                            }

                            // Render HTML
                            $html = '<table style="width:100%;border-collapse:collapse;font-size:0.9rem">';
                            $html .= '<thead><tr>' .
                                '<th style="border:1px solid #ddd;padding:6px;text-align:left">Fecha</th>' .
                                '<th style="border:1px solid #ddd;padding:6px;text-align:left">Puntaje</th>' .
                                '<th style="border:1px solid #ddd;padding:6px;text-align:left">Promedio</th>' .
                                '</tr></thead><tbody>';

                            foreach ($rows as $r) {
                                $fecha = is_object($r->FECHA_EVALUACION) && method_exists($r->FECHA_EVALUACION, 'format')
                                    ? $r->FECHA_EVALUACION->format('Y-m-d')
                                    : (string) $r->FECHA_EVALUACION;

                                $html .= '<tr>' .
                                    '<td style="border:1px solid #ddd;padding:6px">' . $fecha . '</td>' .
                                    '<td style="border:1px solid #ddd;padding:6px">' . ($r->PUNTAJE_TOTAL ?? '') . '</td>' .
                                    '<td style="border:1px solid #ddd;padding:6px">' . ($r->PROMEDIO !== null ? number_format((float)$r->PROMEDIO, 2) : '') . '</td>' .
                                    '</tr>';
                            }
                            $html .= '</tbody></table>';

                            return new HtmlString($html);
                        })
                        ->columnSpanFull(),
                ]),

            Section::make('Pasos y niveles (ICO-OSCAR)')
                ->description('Seleccione el nivel para cada paso. El puntaje se calcula al guardar.')
                ->schema([
                    Repeater::make('respuestas')
                        ->relationship('respuestas')
                        // ... (tus mutateRelationshipDataBefore* como ya tienes) ...
                        ->schema([
                            Hidden::make('PREGUNTA_ID'),

                            // 🔹 Mostrar el texto del paso desde BD (funciona en CREAR y EDITAR)
                            Placeholder::make('PASO_TEXTO')
                                ->label('Paso')
                                ->content(function (Get $get) {
                                    static $cache = [];
                                    $id = $get('PREGUNTA_ID');
                                    if (!$id) return '—';
                                    if (!isset($cache[$id])) {
                                        $cache[$id] = FellowPregunta::find($id)?->PREGUNTA;
                                    }
                                    return $cache[$id] ?? '—';
                                })
                                ->dehydrated(false)
                                ->columnSpanFull(),

                            // ❌ Quitar esto:
                            // TextInput::make('pregunta_txt')->...
                            // Textarea::make('descripcion_txt')->...   // <- “Guía” (eliminar)

                            Radio::make('OPCION_ID')
                                ->label('Nivel')
                                ->options(fn(Get $get) => \App\Models\FellowOpcion::query()
                                    ->where('PREGUNTA_ID', $get('PREGUNTA_ID'))
                                    ->orderBy('ORDEN')
                                    ->get()
                                    ->mapWithKeys(fn($o) => [
                                        $o->ID => $o->ETIQUETA . ' (' . $o->VALOR . ') — ' . ($o->DESCRIPCION ?? '')
                                    ])->toArray())
                                ->live()
                                ->afterStateUpdated(function ($state, Set $set) {
                                    $val = $state ? \App\Models\FellowOpcion::find($state)?->VALOR : null;
                                    $set('VALOR', $val);
                                })
                                ->required(),

                            TextInput::make('VALOR')->label('Puntaje')->numeric()->readOnly(),

                        ])
                ]),
            Placeholder::make('preview_total')
                ->label('Resumen preliminar')
                ->content(function (Get $get) {
                    $items = $get('respuestas') ?? [];
                    $sum = 0;
                    $count = 0;
                    foreach ($items as $r) {
                        $v = (int)($r['VALOR'] ?? 0);
                        if ($v > 0) {
                            $sum += $v;
                            $count++;
                        }
                    }
                    $porc = $count > 0 ? round(($sum / ($count * 5)) * 100, 2) : 0;
                    return new \Illuminate\Support\HtmlString(
                        '<div><strong>Puntaje:</strong> ' . $sum . ' — <strong>%:</strong> ' . $porc . '%</div>'
                    );
                })
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('FECHA_EVALUACION', 'desc')
            ->columns([
                TextColumn::make('FECHA_EVALUACION')->label('Fecha')->date(),
                TextColumn::make('procedimiento.NOMBRE')->label('Procedimiento')->searchable(),
                TextColumn::make('residenteUser.name')
                    ->label('Residente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('PUNTAJE_TOTAL')
                    ->label('Puntaje')
                    ->numeric(0)
                    ->badge()
                    ->colors([
                        'danger' => fn($state) => $state < 10,
                        'warning' => fn($state) => $state >= 10 && $state < 20,
                        'success' => fn($state) => $state >= 20,
                    ])
                    ->icon(fn($state) => $state >= 20 ? 'heroicon-o-trophy' : 'heroicon-o-check'),

                TextColumn::make('PROMEDIO')
                    ->label('Promedio')
                    ->numeric(2)
                    ->badge()
                    ->colors([
                        'danger' => fn($state) => $state < 2,
                        'warning' => fn($state) => $state >= 2 && $state < 3.5,
                        'success' => fn($state) => $state >= 3.5,
                    ])
            ])
            ->filters([
                SelectFilter::make('RESIDENTE_ID')
                    ->label('Residente')
                    ->options(fn() => User::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->toArray())
                    ->query(
                        fn(Builder $q, array $data) =>
                        !empty($data['value']) ? $q->where('RESIDENTE_ID', $data['value']) : $q
                    )
                    ->visible(
                        fn() =>
                        Schema::hasColumn('FELLOW_EVALUACIONES', 'RESIDENTE_ID')
                            && (
                                strtoupper((string)(Auth::user()->TIPO_EVALUADOR_FELLOW ?? 'OWN')) === 'ALL'
                                || (Auth::user()->type ?? null) === 'admin'
                            )
                    ),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Action::make('imprimir')
                    ->label('Imprimir')
                    ->icon('heroicon-o-printer')
                    ->url(fn($record) => route('fellows.eval.print', ['id' => $record->ID, 'print' => 1]))
                    ->openUrlInNewTab(),
                Action::make('curva')
                    ->label('Curva')
                    ->icon('heroicon-o-chart-bar')
                    ->url(fn($record) => route('fellows.curva', [
                        'residente_id'     => (auth()->user()->canViewAllFellowEvals()
                            ? $record->RESIDENTE_ID
                            : auth()->id()),
                        'procedimiento_id' => $record->PROCEDIMIENTO_ID,
                    ]))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFellowEvaluacions::route('/'),
            'create' => Pages\CreateFellowEvaluacion::route('/create'),
            'edit'   => Pages\EditFellowEvaluacion::route('/{record}/edit'),
        ];
    }
}
