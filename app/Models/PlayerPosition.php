<?php

namespace App\Models;

use App\Models\CachedModel;

class PlayerPosition extends CachedModel
{
    protected $table = 'POZYCJA';
    public $timestamps = false;
    protected $primaryKey = 'ID_POZYCJA';

}
