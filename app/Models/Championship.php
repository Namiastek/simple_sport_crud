<?php

namespace App\Models;

use App\Models\CachedModel;

/**
 * CREATE TABLE ROZGRYWKI
(
ID_ROZGRYWKI  INTEGER NOT NULL ,
NAZWA         VARCHAR2 (20 CHAR) NOT NULL ,
ZA_ZWYCIESTWO INTEGER NOT NULL ,
ZA_REMIS      INTEGER NOT NULL
) ;
 * Class Championship
 * @package App\Models
 */
class Championship extends CachedModel
{
    protected $table = 'ROZGRYWKI';
    public $timestamps = false;
    protected $primaryKey = 'ID_ROZGRYWKI';
}
