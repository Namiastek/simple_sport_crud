<?php

namespace App\Models;

use App\Models\CachedModel;
use Illuminate\Database\Eloquent\Model;

/**
 * CREATE TABLE LIC_TRENERSKA
(
ID_LIC_TR INTEGER NOT NULL ,
NAZWA     VARCHAR2 (30 CHAR) NOT NULL
) ;
 * Class CoatchLicence
 * @package App\Models
 */
class CoatchLicence extends CachedModel
{
    protected $table = 'LIC_TRENERSKA';
    public $timestamps = false;
    protected $primaryKey = 'ID_LIC_TR';
}
