<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GerantFerme extends Model
{
    use HasFactory;
    protected $table = 'GerantFermes';
    public const  PK = 'idG';
    public $primaryKey = 'idG';

    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


}
