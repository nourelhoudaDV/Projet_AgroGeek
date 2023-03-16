<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSport extends Model
{
    use HasFactory;
    protected $table = 'user_sports';
    public const  PK = 'id';


}
