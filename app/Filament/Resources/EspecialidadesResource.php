<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EspecialidadesResource\Pages;
use App\Filament\Resources\EspecialidadesResource\RelationManagers;
use App\Models\Especialidades;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EspecialidadesResource extends Resource
{
    protected static ?string $model = Especialidades::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // poner el titulo en español 
    protected static ?string $navigationLabel = 'Especialidades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                ->name('Nombre de la especialidad')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('estado')
                    ->label('Estado')
                    ->helperText('Si está activo, la especialidad estará disponible para los usuarios.')
                    ->default(true)
                    ->required(),
                Forms\Components\FileUpload::make('imagen')
                    ->label('Imagen')
                    ->image()
                    ->preserveFilenames()
                    ->directory('especialidades')
                    ->visibility('public')                
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('estado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEspecialidades::route('/'),
        ];
    }
}
