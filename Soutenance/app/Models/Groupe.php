<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['intitule', 'id_Filiere'];

    public $timestamps = false;

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class, 'id_Groupe');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_Filiere');
    }
}
