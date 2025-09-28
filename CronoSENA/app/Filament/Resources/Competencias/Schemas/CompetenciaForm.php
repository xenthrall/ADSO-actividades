<?php

namespace App\Filament\Resources\Competencias\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompetenciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo_norma')
                    ->required(),
                TextInput::make('nombre')
                    ->required(),
                
                Textarea::make('descripcion_norma')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('duracion_horas')
                    ->required()
                    ->numeric(),
                TextInput::make('version')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('estado')
                    ->label('Activo')
                    ->default(true),
                Select::make('tipo_competencia_id')
                    ->relationship('tipoCompetencia', 'nombre')
                    ->required(),
            ]);
    }
}
