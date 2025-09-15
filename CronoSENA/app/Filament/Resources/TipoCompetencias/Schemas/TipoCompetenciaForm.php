<?php

namespace App\Filament\Resources\TipoCompetencias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TipoCompetenciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('descripcion')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
