<?php

namespace App\Filament\Resources\ResumeRowResource\Pages;

use App\Filament\Resources\ResumeRowResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateResumeRow extends CreateRecord
{
    protected static string $resource = ResumeRowResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data["user_id"] = Auth::user()->id;
//        dd($data);
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Запись успешно добавлена';
    }
}
