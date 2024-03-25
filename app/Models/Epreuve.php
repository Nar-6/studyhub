<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory;

    protected $table = 'epreuves'; // Nom de la table dans la base de données

    protected $primaryKey = 'numEp'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = [
        'dateEp',
        'heurDeb',
        'heurFin',
        'numProf',
        'codFil',
        'codMat',
        'annee'
    ]; // Colonnes autorisées à être affectées en masse

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'numProf', 'numProf');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codFil', 'codFil');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'codMat', 'codMat');
    }
}
