<?php

namespace App\Filament\Resources\ResumeRowResource\Pages;

use App\Filament\Resources\ResumeRowResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResumeRow extends EditRecord
{
    protected static string $resource = ResumeRowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Запись успешно обновлена';
    }
}
