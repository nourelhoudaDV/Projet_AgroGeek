<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferme extends Model
{
    use HasFactory;
    protected $table = 'fermes';
    public $primaryKey = 'idF';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    public const PK = 'idF';

    public function parcelles()
    {
        return $this->hasMany(Parcelle::class, 'ferme');
    }

    public static function allForSelect()
    {
        return self::query()
            ->select('fermes.'.self::PK, \DB::raw('CONCAT(fermes.nomDomaine) as ferme_name'))
            ->get();
    }
}
