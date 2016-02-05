<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

/**
 * CREATE TABLE STADIONY
(
ID_STADION INTEGER NOT NULL ,
NAZWA      VARCHAR2 (30 CHAR) NOT NULL
) ;
 * Class Arena
 * @package App\Models
 */
class Arena extends CachedModel
{
    protected $table = 'STADIONY';
    public $timestamps = false;
    protected $primaryKey = 'ID_STADION';
}
