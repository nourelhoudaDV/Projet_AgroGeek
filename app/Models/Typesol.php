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

    
    public static function allForSelect()
    {
        return self::query()
            ->select('typesols.'.self::PK, \DB::raw('CONCAT(typesols.vernaculaure, " ",typesols.nomDomaine) as typesol_name'))
            ->get();
    }

}
