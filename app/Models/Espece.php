<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;

    protected $table = 'especes';
    public const  PK = 'ide';
    protected $primaryKey = 'ide';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;



    public function stades()
    {
        return $this->hasMany(Stade::class, 'espece');
    }
    public function varietes()
    {
        return $this->hasMany(Variete::class, 'espece');
    }

    public static function allForSelect()
    {
        return self::query()
            ->select('especes.'.self::PK, \DB::raw('CONCAT(especes.nomSc , " ",especes.nomCommercial ) as espece_name'))
            ->get();
    }



}
