<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variete extends Model
{
    use HasFactory;
     protected $table = 'varietes';
     public $primaryKey='idV';
     public $incrementing=true;
     protected $keyType='int';
     public const PK = 'idV';
     public $timestamps = true;

     public function especes(): BelongsTo
     {
        return $this->belongsTo(EspecesModel::class);
     }
}
