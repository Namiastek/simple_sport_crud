<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

class JudgeLicence extends CachedModel
{
    protected $table = 'LIC_SEDZIEGO';
    public $timestamps = false;
    protected $primaryKey = 'ID_LIC_S';
}
