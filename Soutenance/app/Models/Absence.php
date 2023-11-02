<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_Etudiant', 'date', 'is_present'
    ];
    
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_Etudiant');
    }
    
    public function scopeSearch($query, $search)
    {
        return $query->where('Nom', 'like', '%' . $search . '%')
            ->orWhere('Prenom', 'like', '%' . $search . '%');
    }
}

