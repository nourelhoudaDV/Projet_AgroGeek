<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StadeVariete extends Model
{
    use HasFactory;
     protected $table = 'stadeVarietes';
     public $primaryKey='idS';
     public $incrementing=true;
     protected $keyType='int';
     public const PK = 'idS';
     public $timestamps = true;

}
