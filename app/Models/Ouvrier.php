<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'Telephon',
        "idrecalamtion",
        'service',
        "cin",
        "Salaire"
    ];
}
