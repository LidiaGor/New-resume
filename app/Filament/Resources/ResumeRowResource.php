<?php

namespace App\Filament\Resources;


use App\Filament\Resources\ResumeRowResource\Pages;
use App\Filament\Resources\ResumeRowResource\RelationManagers;
use App\Models\ResumeRow;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ResumeRowResource extends Resource
{
    protected static ?string $model = ResumeRow::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $pluralModelLabel = 'Информация о местах работы';
    protected static ?string $modelLabel = 'Место работы';

    protected static ?int $navigationSort = 1;

    public static function getGloballySearchableAttributes(): array
    {
        return ['job_title', 'job_description', 'date_start', 'date_end'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                    ->schema([
                        Fieldset::make('Информация о месте работы')
                            ->schema([
                                DatePicker::make('date_start')
                                    ->label("Дата начала работы")
                                    ->required()
                                    ->maxDate(now()),
                                DatePicker::make('date_end')
                                    ->label("Дата окончания работы")
                                    ->required()
                                    ->maxDate(now()),
                            ])->columns(2),
                        Forms\Components\Select::make('company_id')
                            ->relationship('company', 'name')
                            ->label("Название компании")
                            ->required(),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('job_title')
                                    ->label("Название должности"),
                                RichEditor::make('job_description')
                                    ->label("Описание")
                                    ->helperText('Опишите Ваши должностные обязанности и достижения'),
                            ]),
//                Hidden::make('user_id')->value(Auth::user()->id)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->color('info'),
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date_start')->label("Дата начала работы")
                    ->dateTime('m-Y')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date_end')->label("Дата окончания работы")
                    ->dateTime('m-Y')
                    ->searchable(),
                TextColumn::make('job_title')->label("Название работы")
                    ->sortable()
                    ->searchable(),
//                TextColumn::make('job_description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('info'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResumeRows::route('/'),
            'create' => Pages\CreateResumeRow::route('/create'),
            'edit' => Pages\EditResumeRow::route('/{record}/edit'),
        ];
    }
}


