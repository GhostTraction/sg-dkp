<?php

namespace Dkp\Seat\SeatDKP\Http\Controllers;

use Dkp\Seat\SeatDKP\Models\DkpInfo;
use Seat\Web\Http\Controllers\Controller;

class DkpController extends Controller
{
    public function getMineDkp()
    {
        $dkpList = DkpInfo::join('character_infos', 'character_infos.character_id', '=', 'dkp_info.character_id')
            ->where('dkp_info.user_id', '=', auth()->user()->id)
            ->get();
        return view('dkp::list')->with('dkpList', $dkpList);

    }
}