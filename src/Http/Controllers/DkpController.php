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

        $sumDkp = 0;
        $lockDkp = 0;
        $isUseDkp = 0;

        foreach ($dkpList as $dkp) {
            $status = $dkp->status;
            $score = $dkp->score;
            //累计获取的dkp总量
            if ($status == 1) {
                $sumDkp += $score;
            }
            //兑换锁定的dkp
            if ($status == 2) {
                $lockDkp += $score;
            }
            //已使用的dkp
            if ($status == 3) {
                $isUseDkp += $score;
            }
        }
        return view('dkp::list')->with('dkpList', $dkpList)->
        with('sumDkp', $sumDkp)->with('lockDkp', $lockDkp)->with('isUseDkp', $isUseDkp);

    }
}