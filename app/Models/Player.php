<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

class Player extends CachedModel
{
    protected $table = 'PILKARZ';
    public $timestamps = false;
    protected $primaryKey = 'ID_PILKARZ';
}
