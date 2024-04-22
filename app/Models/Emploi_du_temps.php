<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emploi_du_temps extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emploi_du_temps';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'numEmploi';
    public $timestamps = true;
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numEmploi',
        'lundi_matin', 'lundi_aprem', 'lundi_soir',
        'mardi_matin', 'mardi_aprem', 'mardi_soir',
        'mercredi_matin', 'mercredi_aprem', 'mercredi_soir',
        'jeudi_matin', 'jeudi_aprem', 'jeudi_soir',
        'vendredi_matin', 'vendredi_aprem', 'vendredi_soir',
        'samedi_matin',
        'codFil'
    ];

    /**
     * Get the filiere that owns the emploi du temps.
     */
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codFil', 'codFil');
    }
}
