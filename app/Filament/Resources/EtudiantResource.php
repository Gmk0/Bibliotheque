<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EtudiantResource\Pages;
use App\Filament\Resources\EtudiantResource\RelationManagers;
use App\Models\Etudiant;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EtudiantResource extends Resource
{
    protected static ?string $model = Etudiant::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('matricule')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('postnom')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('prenom')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('faculte')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('user_id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('matricule'),
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('postnom'),
                Tables\Columns\TextColumn::make('prenom'),
                Tables\Columns\TextColumn::make('faculte'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEtudiants::route('/'),
            'create' => Pages\CreateEtudiant::route('/create'),
            'edit' => Pages\EditEtudiant::route('/{record}/edit'),
        ];
    }    
}
