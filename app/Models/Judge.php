<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

class Judge extends CachedModel
{
    protected $table = 'SEDZIA';
    public $timestamps = false;
    protected $primaryKey = 'ID_SEDZIA';
}
