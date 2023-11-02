<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [ 
    'Nom','Prenom','Telephone','image'
];
    
    function etudiants (){
        return $this->hasMany(Etudiant::class);
    }
    public function course()
{
    return $this->belongsTo(Course::class, 'id_Course');
}
public function scopeSearch($query, $search)
{
    return $query->where('Nom', 'like', '%' . $search . '%')
        ->orWhere('Prenom', 'like', '%' . $search . '%');
}

}
