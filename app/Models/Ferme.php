<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferme extends Model
{
    use HasFactory;
    protected $table = 'fermes';
    public $primaryKey = 'idF';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    public const PK = 'idF';
}
