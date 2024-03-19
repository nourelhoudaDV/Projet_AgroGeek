<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModesTechnique extends Model
{
    use HasFactory;
    protected $table = 'modes_technique';
    public $primaryKey = 'idM';
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'idM';
    public $timestamps = true;
}
