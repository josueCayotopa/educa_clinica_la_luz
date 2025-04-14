<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('/')
            ->login()
            ->unsavedChangesAlerts()
            ->spa()
            
            ->colors([
                'primary' => '#B11A1A',
                'secondary' => '#0D3049',
                'tertiary' => '#8B8889',
                'success' => '#A3C9A8',
                'danger' => '#D9A6A1',
                'warning' => '#E6D8A2',
                'info' => '#669BBB',
            ])
            ->topNavigation()
            ->sidebarWidth('40rem') //  Personalizar el ancho de la barra lateral


            // ->userMenuItems([
            //     MenuItem::make()
            //         ->label('Settings')
            //         ->url(fn (): string => Settings::getUrl())
            //         ->icon('heroicon-o-cog-6-tooth'),
            //     // ...
            // ])


            // ->assets([
            //     Css::make('custom-stylesheet', resource_path('css/custom.css')),
            //     Js::make('custom-script', resource_path('js/custom.js')),
            // ])


            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
           
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
