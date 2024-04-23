<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants'; // Nom de la table dans la base de données

    protected $primaryKey = 'matricule'; // Clé primaire de la table

    public $incrementing = false; // Indique que la clé primaire n'est pas auto-incrémentée

    protected $fillable = ['nom', 'prenom', 'sexe', 'numero', 'parent_id']; // Colonnes autorisées à être affectées en masse

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'matricule', 'matricule');
    }
    public function parent()
    {
        return $this->belongsTo(Etudiant_Parent::class, 'parent_id', 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($etudiant) {
            $latestMatricule = static::latest()->value('matricule');

            if ($latestMatricule) {
                // Extraire le numéro de matricule
                $numeroMatricule = (int) substr($latestMatricule, 3);

                // Incrémenter le numéro de matricule
                $numeroMatricule++;

                // Formater le numéro avec des zéros à gauche
                $matricule = 'ETU' . str_pad($numeroMatricule, 3, '0', STR_PAD_LEFT);
            } else {
                // Si aucun étudiant n'existe encore, commencer avec ETU001
                $matricule = 'ETU001';
            }

            $etudiant->matricule = $matricule;
        });
    }
}
