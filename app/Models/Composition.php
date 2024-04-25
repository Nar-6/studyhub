<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    use HasFactory;

    // Nom de la table associée au modèle
    protected $table = 'compositions';

    // Clés primaires personnalisées
    protected $primaryKey = ['numIns', 'numEp'];

    // Indique si les clés primaires sont de type auto-incrément ou non
    public $incrementing = false;

    // Type de données des clés primaires
    protected $keyType = 'integer';

    // Timestamps (création et mise à jour automatiques des colonnes 'created_at' et 'updated_at')
    public $timestamps = true;

    // Mass assignment : attributs qui peuvent être mass assignés
    protected $fillable = [
        'numIns',
        'numEp',
        'note'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


    // Relations
    public function inscription()
    {
        return $this->belongsTo(Inscription::class, 'numIns', 'numIns');
    }

    public function epreuve()
    {
        return $this->belongsTo(Epreuve::class, 'numEp', 'numEp');
    }
}

