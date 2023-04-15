<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Espece extends Model
{
    use HasFactory;
    protected $table = 'especes';
    public $primaryKey = 'ide';
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'ide';
    public $timestamps = false;

    public function varietes(): HasMany
    {
        return $this->hasMany(Variete::class);
    }
}
