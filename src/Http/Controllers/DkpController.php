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
        $sumDkp=0;

        foreach ($dkpList as $dkp){
            $status=$dkp->status;
            if ($status==1){

            }else if($status==2){

            }
        }
        return view('dkp::list')->with('dkpList', $dkpList);

    }
}