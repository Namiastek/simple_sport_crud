<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

class Team extends CachedModel
{
    protected $table = 'DRUZYNA';
    public $timestamps = false;
    protected $primaryKey = 'ID_DRUZYNA';
}
