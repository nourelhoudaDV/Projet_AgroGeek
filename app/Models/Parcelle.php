<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;
    protected $table = 'parcelles';
    public $primaryKey='idp';
    public $incrementing=true;
    protected $keyType='int';
    public $timestamps=false;
    public const  PK = 'idp';
}
