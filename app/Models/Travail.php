<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Travail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricule',
        'titre',
        'categorie',
        'annee_academique',
        'code_classification',
        'nbre_pages',
        'viewCount',
        'path',
        'domaine_id',
        'etudiant_id',
        'publier',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'viewCount' => 'decimal:2',
        'domaine_id' => 'integer',
    ];

    public function domaine(): BelongsTo
    {
        return $this->belongsTo(Domaine::class);
    }

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }
}