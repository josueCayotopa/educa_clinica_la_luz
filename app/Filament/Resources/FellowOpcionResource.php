<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FellowOpcionResource\Pages;
use App\Filament\Resources\FellowOpcionResource\RelationManagers;
use App\Models\FellowOpcion;
use App\Models\FellowPregunta;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class FellowOpcionResource extends Resource
{
    protected static ?string $model = FellowOpcion::class;


    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';
    // protected static ?string $navigationGroup = 'Fellows';
    protected static ?string $navigationLabel = 'Opciones de Preguntas';
    protected static ?string $pluralModelLabel = 'Opciones';
    protected static ?string $modelLabel = 'Opción';
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->canViewAllFellowEvals() ?? false;
    }
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Datos de la opción')->schema([
                Select::make('PREGUNTA_ID')
                    ->label('Pregunta')
                    ->options(
                        FellowPregunta::query()
                            ->orderBy('PREGUNTA')
                            ->pluck('PREGUNTA', 'ID')
                            ->toArray()
                    )
                    ->searchable()
                    ->required(),

                TextInput::make('ETIQUETA')
                    ->label('Etiqueta (nombre corto)')
                    ->required()
                    ->maxLength(100),

                TextInput::make('VALOR')
                    ->label('Valor numérico')
                    ->numeric()
                    ->required(),

                Textarea::make('DESCRIPCION')
                    ->label('Descripción')
                    ->rows(2)
                    ->maxLength(255),

                TextInput::make('ORDEN')
                    ->label('Orden')
                    ->numeric()
                    ->default(1),

                Toggle::make('ACTIVO')
                    ->label('Activo')
                    ->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('ORDEN')
            ->columns([
                TextColumn::make('pregunta.PREGUNTA')->label('Pregunta')->sortable()->searchable(),
                TextColumn::make('ETIQUETA')->label('Etiqueta')->sortable()->searchable(),
                TextColumn::make('VALOR')->label('Valor')->sortable(),
                TextColumn::make('DESCRIPCION')->label('Descripción')->wrap(),
                TextColumn::make('ORDEN')->label('Orden')->sortable(),
                IconColumn::make('ACTIVO')->label('Activo')->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('ACTIVO')->label('Estado'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFellowOpcions::route('/'),
            'create' => Pages\CreateFellowOpcion::route('/create'),
            'edit'   => Pages\EditFellowOpcion::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) FellowOpcion::query()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }
}
