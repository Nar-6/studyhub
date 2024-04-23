<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant_Parent extends Model
{
    use HasFactory;

    protected $table = 'etudiant_parents'; // Nom de la table dans la base de données

    protected $primaryKey = 'parent_id'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $fillable = ['nom', 'user_id']; // Colonnes autorisées à être affectées en masse

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function enfants()
    {
        return $this->hasMany(Etudiant::class, 'parent_id', 'parent_id');
    }
}
