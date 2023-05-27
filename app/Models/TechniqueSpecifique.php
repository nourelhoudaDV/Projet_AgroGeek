<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechniqueSpecifique extends Model
{
    use HasFactory;
    protected $table = 'techniques_specifiques';
    public $primaryKey = 'idTS';
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'idTS';
    public $timestamps = false;
}
