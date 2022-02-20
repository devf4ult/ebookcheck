<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebooks extends Model
{
    protected $fillable = [
        'name', 'file', 'category'
    ];
}
