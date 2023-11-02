<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    
       
    use HasFactory;

    protected $fillable = [
        'id_Etudiant',
        'id_Course',
        'note1',
        'note2',
        'note3',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_Etudiant');
    }
    

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_Filiere');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_Course');
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereHas('etudiant', function ($q) use ($search) {
            $q->where('Nom', 'like', '%' . $search . '%')
                ->orWhere('Prenom', 'like', '%' . $search . '%');
        });
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_Groupe');
    }

    public function getNoteByCourseAndEtudiant($courseId, $etudiantId)
    {
        return $this->where('id_Course', $courseId)
            ->where('id_Etudiant', $etudiantId)
            ->first();
    }

}

