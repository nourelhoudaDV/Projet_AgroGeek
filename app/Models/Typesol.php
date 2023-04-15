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


}
