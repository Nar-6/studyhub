<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory;

    protected $table = 'epreuves'; // Nom de la table dans la base de données

    protected $primaryKey = 'numEp'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté
    public $timestamps = true;

    protected $fillable = [
        'nomEp',
        'dateEp',
        'heurDeb',
        'heurFin',
        'numProf',
        'codFil',
        'codMat',
        // 'annee'
    ]; // Colonnes autorisées à être affectées en masse

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'numProf', 'nomProf');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codFil', 'codFil');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'codMat', 'codMat');
    }

    public function questions()
    {
        return $this->hasMany(Question::class,'epreuve_numEp');
    }


    public function results()
    {
        return $this->hasMany(Result::class, 'numEp');
    }

     // Mutateur pour convertir la colonne dateEp en objet date
     public function setDateEpAttribute($value)
     {
         $this->attributes['dateEp'] = Carbon::parse($value);
     }

}
