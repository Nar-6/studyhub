<?php

namespace App\Models;

use Database\Factories\EtudiantFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants'; // Nom de la table dans la base de données

    protected $primaryKey = 'matricule'; // Clé primaire de la table
    public $timestamps = true;

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = [ 'nom', 'prenom', 'sexe', 'parentId']; // Colonnes autorisées à être affectées en masse

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'matricule', 'matricule');
    }

    public function parent()
    {
        return $this->belongsTo(Etudiant_Parent::class, 'parentId', 'parentId');
    }

    protected static function newFactory()
    {
        return EtudiantFactory::new();
    }

}
