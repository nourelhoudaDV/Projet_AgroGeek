<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stade extends Model
{
    use HasFactory;
     protected $table = 'stades';
     public $primaryKey='idS';
     public $incrementing=true;
     protected $keyType='int';
     public const PK = 'idS';
     public $timestamps = true;

}
