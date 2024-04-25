<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins'; // Nom de la table dans la base de données

    public $incrementing = true; // Indique si la clé primaire est un nombre auto-incrémenté
    public $timestamps = true;

    protected $fillable = [ 'nom','prenom', 'user_id']; // Colonnes autorisées à être affectées en masse

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
