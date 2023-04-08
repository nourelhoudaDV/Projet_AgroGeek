<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EspecesModel extends Model
{
    use HasFactory;
    protected $table = 'especes_models';
    public const  PK = 'id';
    public $timestamps = false;

    public function varietes(): HasMany
    {
        return $this->hasMany(Variete::class);
    }
}
