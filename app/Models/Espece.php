<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;

    public const  PK = 'ide';

    protected $primaryKey = 'ide';


    public function stades()
    {
        return $this->hasMany(Stade::class, 'espece');
    }

    public static function allForSelect()
    {
        return self::query()
            ->select('especes.'.self::PK, \DB::raw('CONCAT(especes.nomSc , " ",especes.nomCommercial ) as espece_name'))
            ->get();
    }



}
