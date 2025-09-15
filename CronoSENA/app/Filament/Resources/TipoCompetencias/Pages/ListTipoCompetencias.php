<?php

namespace App\Filament\Resources\TipoCompetencias\Pages;

use App\Filament\Resources\TipoCompetencias\TipoCompetenciaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTipoCompetencias extends ListRecords
{
    protected static string $resource = TipoCompetenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
