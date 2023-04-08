<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variete extends Model
{
    use HasFactory;
     protected $table = 'varietes';
     public const PK = 'id'; 
     public $timestamps = true;

     public function especes_models(): BelongsTo
     {
        return $this->belongsTo(EspecesModel::class);
     }
}
