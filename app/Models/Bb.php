<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bb extends Model
{
    use HasFactory;
    
    //各項目を追加している
    protected $fillable = [
        'title',
        'body',
    ];
}
