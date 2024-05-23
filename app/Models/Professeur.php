<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $table = 'professeurs'; // Nom de la table dans la base de données

    protected $primaryKey = 'numProf'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = ['numProf', 'nomProf', 'user_id']; // Colonnes autorisées à être affectées en masse

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    // Relation avec le modèle User (un parent appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function epreuves()
    {
        $this->hasMany(Epreuve::class, "numProf", "numProf");
    }
}
