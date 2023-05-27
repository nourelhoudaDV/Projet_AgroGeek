<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $primaryKey = 'idQT';
    public $timestamps = false;
    protected $keyType = 'int';
     public const PK = 'idQT';
}

