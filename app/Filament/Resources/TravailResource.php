<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TravailResource\Pages;
use App\Filament\Resources\TravailResource\RelationManagers;
use App\Models\Travail;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TravailResource extends Resource
{
    protected static ?string $model = Travail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('etudiant_id')
                    ->required(),
                Forms\Components\Select::make('domaine_id')
                    ->relationship('domaine', 'id')
                    ->required(),
                Forms\Components\TextInput::make('matricule')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('image')
                    ->maxLength(250),
                Forms\Components\TextInput::make('categorie')
                    ->maxLength(250),
                Forms\Components\TextInput::make('annee_academique')
                    ->maxLength(250),
                Forms\Components\TextInput::make('code_classification')
                    ->maxLength(250),
                Forms\Components\TextInput::make('nbre_pages')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('viewCount')
                    ->required(),
                Forms\Components\TextInput::make('path')
                    ->required()
                    ->maxLength(250),
                Forms\Components\Toggle::make('publier')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('matricule'),
                Tables\Columns\TextColumn::make('etudiant.nom'),
                Tables\Columns\TextColumn::make('domaine.intitule'),

                Tables\Columns\TextColumn::make('titre'),
                Tables\Columns\TextColumn::make('image'),
                Tables\Columns\TextColumn::make('categorie'),
                Tables\Columns\TextColumn::make('annee_academique'),
                Tables\Columns\TextColumn::make('code_classification'),

                Tables\Columns\TextColumn::make('viewCount'),
                Tables\Columns\TextColumn::make('path'),
                Tables\Columns\IconColumn::make('publier')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListTravails::route('/'),
            'create' => Pages\CreateTravail::route('/create'),
            'edit' => Pages\EditTravail::route('/{record}/edit'),
        ];
    }
}