<?php

namespace Dkp\Seat\SeatDKP\Models;


use Illuminate\Database\Eloquent\Model;


class DkpInfo extends Model
{
    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $table = 'dkp_info';

    protected $fillable = ['id', 'user_id', 'character_id', 'score', 'status', 'remark',];

}