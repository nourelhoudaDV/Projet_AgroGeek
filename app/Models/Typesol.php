<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typesol extends Model
{
    use HasFactory;
    protected $table = 'typesols';
    public $primaryKey='idTS';
    public $incrementing=true;
    protected $keyType='int';
    public $timestamps=false;
    public const PK='idTS';

    // public function parcelles()
    // {
    //     return $this->hasMany(Parcelle::class, 'typesol');
    // }
    // public static function allForSelect()
    // {
    //     return self::query()
    //         ->select('typesol.'.self::PK, \DB::raw('CONCAT(typesols.vernaculaure, " ",typesols.nomDomaine) as typesol_name'))
    //         ->get();
    // }

}
