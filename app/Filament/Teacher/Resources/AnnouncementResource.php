<?php

namespace App\Filament\Teacher\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\UserTypeEnum;
use App\Models\Announcement;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Teacher\Resources\AnnouncementResource\Pages;
use App\Filament\Teacher\Resources\AnnouncementResource\RelationManagers;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->required(),
                Select::make('announcement_for')
                    ->label('Announcement For')
                    ->required()
                    ->live()
                    ->options([
                        'both' => 'Both',
                        'students' => 'Students',
                        'parents' => 'Parents'
                    ]),
                // Forms\Components\Select::make('teachers')
                //     ->label(function(Get $get){
                //         if(!empty($get('announcement_for')))
                //         {
                //             return 'Target '.ucfirst($get('announcement_for'));
                //         }
                //     })
                //     ->multiple()
                //     ->required()
                //     ->relationship('teachers', 'name')
                //     ->options(function(Get $get){
                //         if(!empty($get('announcement_for')) && $get('announcement_for') == 'student')
                //         {
                //            return User::role('Student')->pluck('name', 'id')->toArray();
                //         } elseif(!empty($get('announcement_for')) && $get('announcement_for') == 'parent')
                //         {
                //             return User::role('Parent')->pluck('name', 'id')->toArray();
                //         }
                //         return [];
                //     })
                //     ->searchable()
                //     ->visible(function(Get $get){
                //         if(!empty($get('announcement_for')))
                //         {
                //             return true;
                //         }
                //         return false;
                //     }),
                
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function (Builder $query) {
                return Announcement::query()->where('user_id', auth()->id());
            })
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('content')->limit(20)
                ->formatStateUsing(function ($state) {
                    return strip_tags($state);
                })
                ->searchable()->sortable(),
                TextColumn::make('announcement_for')->searchable()->sortable(),
                TextColumn::make('created_at')->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}
