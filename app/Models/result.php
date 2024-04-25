<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;


    protected $guarded = ['id', 'created_at', 'updated_at'];

    // protected $fillable = ['numEp', 'total_points', 'user_id'];

    public function epreuve()
    {
        return $this->belongsTo(Epreuve::class, 'numEp', 'numEp');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
