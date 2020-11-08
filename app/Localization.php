<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'latitude', 'longitude'
    ];
}
