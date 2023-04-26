<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $primaryKey = 'idQ';
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'description',
        'techniqueA_id',
    ];
    protected $keyType = 'int'; public const PK = 'idQ';
}

