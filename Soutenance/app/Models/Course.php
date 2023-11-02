<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom',
        'id_Filiere',
    ];

   
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_Filiere');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_Course');
    }
  
}