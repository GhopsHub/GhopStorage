<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Proyectos;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;

class ProyectsWidget extends AdvancedStatsOverviewWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $activos = Proyectos::where('estado', 'activo')->count();
        $finalizados = Proyectos::where('estado', 'finalizado')->count();
        $pendientes = Proyectos::where('estado', 'pendiente')->count();
        $cancelados = Proyectos::where('estado', 'cancelado')->count();

        $isDarkMode = config('filament.dark_mode');

        return [
            Stat::make('Activos', $activos)
                ->icon('heroicon-o-rocket-launch')
                ->descriptionIcon('heroicon-o-chevron-up', 'before')
                ->backgroundColor($isDarkMode ? 'gray-700' : 'white')
                ->iconColor($isDarkMode ? 'white' : 'black')
                ->color($isDarkMode ? 'white' : 'black')
                ->description('Proyectos activos')
                ->descriptionColor('success')
                ->iconColor('success'),


            Stat::make('Pendientes', $pendientes)
                ->icon('heroicon-o-clock')
                ->descriptionIcon('heroicon-o-pause', 'before')
                ->backgroundColor($isDarkMode ? 'gray-700' : 'white')
                ->iconColor($isDarkMode ? 'white' : 'black')
                ->color($isDarkMode ? 'white' : 'black')
                ->description('Proyectos pendientes')
                ->descriptionColor('warning')
                ->iconColor('warning'),


            Stat::make('Finalizados', $finalizados)
                ->icon('heroicon-o-check-badge')
                ->descriptionIcon('heroicon-o-check', 'before')
                ->backgroundColor($isDarkMode ? 'gray-700' : 'white')
                ->iconColor($isDarkMode ? 'white' : 'black')
                ->color($isDarkMode ? 'white' : 'black')
                ->description('Proyectos finalizados')
                ->descriptionColor('info')
                ->iconColor('info'),


            Stat::make('Cancelados', $cancelados)
                ->icon('heroicon-o-x-circle')
                ->descriptionIcon('heroicon-o-chevron-down', 'before')
                ->backgroundColor($isDarkMode ? 'gray-700' : 'white')
                ->iconColor($isDarkMode ? 'white' : 'black')
                ->color($isDarkMode ? 'white' : 'black')
                ->description('Proyectos cancelados')
                ->descriptionColor('danger')
                ->iconColor('danger'),
        ];
    }
}
