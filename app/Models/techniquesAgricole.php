<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class techniquesAgricole extends Model
{
    use HasFactory;
    protected $table = 'techniques_agricoles';
    public $primaryKey = 'idTA';
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'idTA';
    public $timestamps = true;
}
