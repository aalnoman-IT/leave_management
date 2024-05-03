<?php

namespace App\Filament\Widgets;
namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Resources\Resource;

class LatestLeaveRequests extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query( LeaveResource::getEloquentQuery())
            ->defualtPaginationPageOption(option: 5)
            ->defaultSort(column: 'created_at', direction:'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
            
                ->sortable(),
            Tables\Columns\TextColumn::make('leaveType.name')
              
                ->sortable(),
            Tables\Columns\TextColumn::make('start_date')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('end_date')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('leaveStatus.name'),
                
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
    
}
