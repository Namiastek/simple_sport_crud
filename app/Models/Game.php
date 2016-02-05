<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

/**
 * CREATE TABLE MECZ
(
ID_MECZ                INTEGER NOT NULL ,
DATA                   DATE NOT NULL ,
DRUZYNA_ID_DRUZYNA     INTEGER NOT NULL ,
DRUZYNA_ID_DRUZYNA2    INTEGER NOT NULL ,
GOL_DRUZYNA            INTEGER NOT NULL ,
GOL_DRUZYNA1           INTEGER NOT NULL ,
SEDZIA_ID_SEDZIA       INTEGER NOT NULL ,
ROZGRYWKI_ID_ROZGRYWKI INTEGER NOT NULL ,
STADIONY_ID_STADION    INTEGER NOT NULL
) ;
 * Class Game
 * @package App\Models
 */
class Game extends CachedModel
{
    protected $table = 'MECZ';
    public $timestamps = false;
    protected $primaryKey = 'ID_MECZ';
}
