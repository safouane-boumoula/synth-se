<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom',
        'Prenom',
        'id_Groupe',
        'image'
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_Groupe');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_Etudiant');
    }

    public function absence()
    {
        return $this->hasOne(Absence::class, 'id_Etudiant');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_Filiere');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'etudiant_course', 'id_Etudiant', 'id_Course');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('Nom', 'like', '%' . $search . '%')
            ->orWhere('Prenom', 'like', '%' . $search . '%');
    }
}
