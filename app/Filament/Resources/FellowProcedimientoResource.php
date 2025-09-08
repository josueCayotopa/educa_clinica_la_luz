<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FellowProcedimientoResource\Pages;
use App\Filament\Resources\FellowProcedimientoResource\RelationManagers;
use App\Models\FellowProcedimiento;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FellowProcedimientoResource extends Resource
{
    protected static ?string $model = FellowProcedimiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Datos del procedimiento')
                ->description('Defina el nombre del procedimiento tal como se mostrará a los evaluadores.')
                ->schema([
                    TextInput::make('NOMBRE')
                        ->label('Nombre del procedimiento')
                        ->required()
                        ->maxLength(255)
                        ->unique(
                            table: 'FELLOW_PROCEDIMIENTOS',
                            column: 'NOMBRE',
                            ignoreRecord: true
                        )
                        ->helperText('Ej.: Facoemulsificación de catarata / DMEK / PKP')
                        ->autofocus()
                        ->dehydrateStateUsing(fn ($state) => trim(mb_strtoupper($state))),
                ])
                ->columns(1),

            Section::make('Estado y publicación')
                ->schema([
                    Toggle::make('ACTIVO')
                        ->label('Activo')
                        ->default(true)
                        ->helperText('Si está inactivo, no aparecerá en listas ni formularios.')
                        ->inline(false),
                ])
                ->columns(1),
    
            ]);
    }

    
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('NOMBRE')
            ->columns([
                TextColumn::make('NOMBRE')
                    ->label('Procedimiento')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('ACTIVO')
                    ->label('Estado')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                TernaryFilter::make('estado')
                    ->label('Filtrar por estado')
                    ->placeholder('Todos')
                    ->trueLabel('Solo activos')
                    ->falseLabel('Solo inactivos')
                    ->queries(
                        true: fn (Builder $q) => $q->where('ACTIVO', '1'),
                        false: fn (Builder $q) => $q->where('ACTIVO', '0'),
                        blank: fn (Builder $q) => $q
                    ),
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
            'index' => Pages\ListFellowProcedimientos::route('/'),
            'create' => Pages\CreateFellowProcedimiento::route('/create'),
            'edit' => Pages\EditFellowProcedimiento::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return (string) FellowProcedimiento::query()->where('ACTIVO', '1')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}
