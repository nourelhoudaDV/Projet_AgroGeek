<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMateriel extends Model
{
    use HasFactory;

    protected $table = 'typesMateriel';
    protected $primaryKey = 'idTM';
    public $timestamps = false;
  
    protected $keyType = 'int';
    public const PK = 'idTM';

    public function techniqueAgricole()
    {
        return $this->belongsTo(TechniqueAgricole::class, 'techniqueA_id');
    }
}
