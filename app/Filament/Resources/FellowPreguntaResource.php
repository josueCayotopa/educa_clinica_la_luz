<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FellowPreguntaResource\Pages;
use App\Filament\Resources\FellowPreguntaResource\RelationManagers;
use App\Models\FellowPregunta;
use App\Models\FellowProcedimiento;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FellowPreguntaResource extends Resource
{
    protected static ?string $model = FellowPregunta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Asociación al procedimiento')
                ->schema([
                    Select::make('PROCEDIMIENTO_ID')
                        ->label('Procedimiento')
                        ->relationship('procedimiento', 'NOMBRE')
                        ->required()
                        ->searchable()
                        ->helperText('El procedimiento al que pertenece esta pregunta.')
                        ->preload()
                        ->reactive(),
                ])
                ->columns(1),

            Section::make('Contenido de la pregunta')
                ->schema([
                    TextInput::make('PREGUNTA')
                        ->label('Pregunta')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                        // ❌ Antes: ->dehydrateStateUsing(fn ($s) => trim($s))
                        ->dehydrateStateUsing(fn(string $state) => trim($state)),

                    Textarea::make('DESCRIPCION')
                        ->label('Descripción / guía (opcional)')
                        ->rows(3)
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->dehydrateStateUsing(fn(?string $state) => $state ? trim($state) : null),
                ])
                ->columns(1),

            Section::make('Configuración y estado')
                ->schema([
                    TextInput::make('ORDEN')
                        ->label('Orden de aparición')
                        ->numeric()
                        ->minValue(0)
                        ->default(0)
                        ->helperText('Menor valor = aparece antes en el formulario.'),
                    Toggle::make('ACTIVO')
                        ->label('Activo')
                        ->default(true)
                        ->inline(false),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                TextColumn::make('procedimiento.NOMBRE')
                    ->label('Procedimiento')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('PREGUNTA')
                    ->label('Pregunta')
                    ->searchable()
                    ->limit(60),
                TextColumn::make('ORDEN')
                    ->label('Orden')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('ACTIVO')
                    ->label('Estado')
                    ->boolean(),
            ])
            ->filters([
                // SelectFilter::make('PROCEDIMIENTO_ID')
                //     ->label('Procedimiento')
                //     ->relationship('procedimiento', 'NOMBRE', fn(Builder $q) => $q->orderBy('NOMBRE')),
                // TernaryFilter::make('estado')
                //     ->label('Estado')
                //     ->placeholder('Todos')
                //     ->trueLabel('Solo activos')
                //     ->falseLabel('Solo inactivos')
                //     ->queries(
                //         true: fn(Builder $q) => $q->where('ACTIVO', '1'),
                //         false: fn(Builder $q) => $q->where('ACTIVO', '0'),
                //         blank: fn(Builder $q) => $q
                //     ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFellowPreguntas::route('/'),
            'create' => Pages\CreateFellowPregunta::route('/create'),
            'edit' => Pages\EditFellowPregunta::route('/{record}/edit'),
        ];
    }
}
