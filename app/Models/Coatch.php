<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

class Coatch extends CachedModel
{
    protected $table = 'TRENER';
    public $timestamps = false;
    protected $primaryKey = 'ID_TRENER';
}
