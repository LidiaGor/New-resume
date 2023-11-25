<?php

namespace App\Filament\Resources\ResumeRowResource\Pages;

use App\Filament\Resources\ResumeRowResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResumeRows extends ListRecords
{
    protected static string $resource = ResumeRowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

