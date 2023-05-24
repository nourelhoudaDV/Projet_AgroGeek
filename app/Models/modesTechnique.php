<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modesTechnique extends Model
{
    use HasFactory;
    protected $table = 'modes_techniques';
    public $primaryKey = 'idMT';
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'idMT';
    public $timestamps = true;
}
