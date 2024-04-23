<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $table = 'matieres'; // Nom de la table dans la base de données

    protected $primaryKey = 'codMat'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = [ 'libMat']; // Colonnes autorisées à être affectées en masse

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function epreuves() {
        return $this->hasMany(Epreuve::class,'codMat','codMat');
    }

}
