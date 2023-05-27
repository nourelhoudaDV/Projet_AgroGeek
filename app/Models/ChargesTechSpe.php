<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargesTechSpe extends Model
{
    use HasFactory;
    protected $table = 'charges_tech_spe';
    public $primaryKey = 'idCh';
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'idCh';
    public $timestamps = false;
}
