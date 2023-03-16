<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    public const  PK = 'id';
    public $timestamps = true;
//    protected $dates = [
//        "date_of_birth"
//    ];


}
