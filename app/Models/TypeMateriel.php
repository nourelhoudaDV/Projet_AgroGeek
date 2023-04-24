<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMateriel extends Model
{
    use HasFactory;
    protected $table = 'typesMateriel';
    protected $primaryKey = 'idTM';
    protected $fillable = ['nom', 'description', 'techniqueA'];
    
    public function techniqueAgricole()
    {
        return $this->belongsTo(TechniqueAgricole::class, 'techniqueA');
    }
}
