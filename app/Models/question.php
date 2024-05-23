<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table = 'questions'; // Nom de la table dans la base de données

    protected $primaryKey = 'id'; // Clé primaire de la table

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [

        'epreuve_numEp',
        'question_text',
        'reponse_text',
        'points',
     ]; // Colonnes autorisées à être affectées en masse

    public function epreuves()
    {
        return $this->belongsTo(Epreuve::class, 'numEp', );
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
