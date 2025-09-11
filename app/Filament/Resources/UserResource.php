<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{


    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Usuarios';
    protected static ?string $modelLabel = 'Usuario';
    protected static ?string $pluralModelLabel = 'Usuarios';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 1;
    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('viewAny') ?? false;
    // }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información Personal')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nombre Completo')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('usuario')
                                ->label('Usuario')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(255),
                        ]),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('email')
                                ->label('Correo Electrónico')
                                ->email()
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(255),

                            Forms\Components\TextInput::make('password')
                                ->label('Contraseña')
                                ->password()
                                ->required(fn(string $context): bool => $context === 'create')
                                ->dehydrated(fn($state) => filled($state))
                                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                ->maxLength(255),
                        ]),
                    ]),
                Forms\Components\Section::make('Roles y Permisos')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\Select::make('type')
                                ->label('Tipo de Usuario (General)')
                                ->options([
                                    'admin' => 'Administrador',
                                    'doctor' => 'Doctor',
                                    'enfermero' => 'Enfermero',
                                    'recepcionista' => 'Recepcionista',
                                    'seguridad' => 'Seguridad',
                                    'otro' => 'Otro',
                                ])
                                ->required()
                                ->native(false),

                            Forms\Components\Select::make('type_sis_permiso')
                                ->label('Rol en Sistema de Permisos')
                                ->options([
                                    User::TIPO_ADMIN => 'Administrador - Acceso Total',
                                    User::TIPO_RH => 'Gerencia de Recursos Humanos',
                                    User::TIPO_ADMIN_AREA => 'Administrador de Area',
                                    User::TIPO_SUPERVISOR => 'Supervisor - Puede Aprobar',
                                    User::TIPO_SEGURIDAD => 'Seguridad - Control Entrada/Salida',
                                    User::TIPO_USUARIO => 'Usuario - Solo Crear Permisos',
                                    User::TIPO_SIN_ACCESO => 'Sin Acceso al Sistema',
                                ])
                                ->required()
                                ->native(false)
                                ->helperText('Define qué puede hacer en el sistema de permisos de salida'),
                        ]),

                        Toggle::make('active')
                            ->label('Usuario activo')
                            ->helperText('Solo usuarios activos pueden acceder al sistema.')
                            ->default(true),

                        ToggleButtons::make('TIPO_EVALUADOR_FELLOW')
                            ->label('Evaluador Fellow')
                            ->helperText('OWN: solo ve/gestiona sus evaluaciones. ALL: ve/gestiona las de todos.')
                            ->options([
                                'OWN' => 'OWN (solo propias)',
                                'ALL' => 'ALL (todas)',
                            ])
                            ->colors([
                                'OWN' => 'warning',
                                'ALL' => 'success',
                            ])
                            ->icons([
                                'OWN' => 'heroicon-o-lock-closed',
                                'ALL' => 'heroicon-o-eye',
                            ])
                            ->inline()
                            ->required()
                            ->default('OWN'),
                    ])
                    ->columns(1),
                Forms\Components\Section::make('Información Adicional')
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Fecha de Creación')
                            ->content(fn($record): string => $record?->created_at?->format('d/m/Y H:i') ?? 'No disponible')
                            ->visible(fn($record) => $record !== null),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Última Actualización')
                            ->content(fn($record): string => $record?->updated_at?->format('d/m/Y H:i') ?? 'No disponible')
                            ->visible(fn($record) => $record !== null),
                    ])
                    ->visible(fn($record) => $record !== null),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('')
                    ->circular()
                    ->defaultImageUrl(fn($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&color=7F9CF5&background=EBF4FF')
                    ->size(40),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()

                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copiado'),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Tipo General')
                    ->colors([
                        'danger' => 'admin',
                        'warning' => 'doctor',
                        'success' => 'enfermero',
                        'info' => 'recepcionista',
                        'primary' => 'seguridad',
                        'gray' => 'otro',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),


                Tables\Columns\IconColumn::make('active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha Creación')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                Tables\Filters\TernaryFilter::make('active')
                    ->label('Estado')
                    ->placeholder('Todos')
                    ->trueLabel('Solo Activos')
                    ->falseLabel('Solo Inactivos'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('cambiar_estado')
                        ->label(fn($record) => $record->active ? 'Desactivar' : 'Activar')
                        ->icon(fn($record) => $record->active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                        ->color(fn($record) => $record->active ? 'danger' : 'success')
                        ->requiresConfirmation()
                        ->modalHeading(fn($record) => $record->active ? 'Desactivar Usuario' : 'Activar Usuario')
                        ->modalDescription(
                            fn($record) =>
                            $record->active
                                ? "¿Estás seguro de desactivar a {$record->name}? No podrá acceder al sistema."
                                : "¿Estás seguro de activar a {$record->name}? Podrá acceder al sistema."
                        )
                        ->action(function ($record) {
                            $record->update(['active' => !$record->active]);

                            Notification::make()
                                ->title($record->active ? 'Usuario Activado' : 'Usuario Desactivado')
                                ->success()
                                ->send();
                        }),

                    Tables\Actions\Action::make('resetear_password')
                        ->label('Resetear Contraseña')
                        ->icon('heroicon-o-key')
                        ->color('warning')
                        ->form([
                            Forms\Components\TextInput::make('new_password')
                                ->label('Nueva Contraseña')
                                ->password()
                                ->required()
                                ->minLength(6),
                        ])
                        ->action(function ($record, array $data) {
                            $record->update([
                                'password' => Hash::make($data['new_password'])
                            ]);

                            Notification::make()
                                ->title('Contraseña Actualizada')
                                ->body("La contraseña de {$record->name} ha sido actualizada")
                                ->success()
                                ->send();
                        }),

                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()

                ])
                    ->label('Acciones')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->size('sm')
                    ->color('gray')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('activar_usuarios')
                        ->label('Activar Seleccionados')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $count = $records->count();
                            foreach ($records as $record) {
                                $record->update(['active' => true]);
                            }

                            Notification::make()
                                ->title("{$count} usuarios activados")
                                ->success()
                                ->send();
                        }),

                    Tables\Actions\BulkAction::make('desactivar_usuarios')
                        ->label('Desactivar Seleccionados')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $count = $records->count();
                            foreach ($records as $record) {
                                $record->update(['active' => false]);
                            }

                            Notification::make()
                                ->title("{$count} usuarios desactivados")
                                ->warning()
                                ->send();
                        }),

                    Tables\Actions\DeleteBulkAction::make()

                ]),
            ])
            ->emptyStateHeading('No hay usuarios registrados')
            ->emptyStateDescription('Crea el primer usuario para comenzar.')
            ->emptyStateIcon('heroicon-o-users');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
