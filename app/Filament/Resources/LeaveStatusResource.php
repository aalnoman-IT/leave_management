<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveStatusResource\Pages;
use App\Filament\Resources\LeaveStatusResource\RelationManagers;
use App\Models\LeaveStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeaveStatusResource extends Resource
{
    protected static ?string $model = LeaveStatus::class;

    protected static ?string $navigationLabel = 'Leave Status';
    protected static ?string $modelLabel = 'Leave Status';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';
    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                    
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
              
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLeaveStatuses::route('/'),
            'create' => Pages\CreateLeaveStatus::route('/create'),
            'view' => Pages\ViewLeaveStatus::route('/{record}'),
            'edit' => Pages\EditLeaveStatus::route('/{record}/edit'),
        ];
    }
    
}
