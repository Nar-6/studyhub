<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $table = 'filieres'; // Nom de la table dans la base de données

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = ['codFil', 'libFil']; // Colonnes autorisées à être affectées en masse
    public $timestamps = true;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'codFil', 'codFil');
    }

    public function epreuves()
    {
        return $this->hasMany(Epreuve::class, 'codFil', 'codFil');
    }

    public function emploieDuTemps()
    {
        return $this->hasMany(Emploi_du_temps::class, 'codFil', 'codFil');
    }
}
