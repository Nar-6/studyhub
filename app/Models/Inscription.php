<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions'; // Nom de la table dans la base de données

    protected $primaryKey = 'numIns'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = ['dateIns','annee','codFil','matricule', 'user_id']; // Colonnes autorisées à être affectées en masse

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    // app/Models/Inscription.php
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'matricule', 'matricule');
    }

    public function compositions()
    {
        return $this->hasMany(Composition::class, 'numIns', 'numIns');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codFil', 'codFil');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}


