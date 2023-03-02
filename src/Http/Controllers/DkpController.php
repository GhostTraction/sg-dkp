<?php

namespace Dkp\Seat\SeatDKP\HttpControllers;

use Seat\SeatDKP\Models\DkpInfo;
use Seat\Web\Http\Controllers\Controller;

class DkpController extends Controller
{
    public function getMineDkp()
    {
        $dkpList = DkpInfo::where(function ($query) {
            $query->where('id', '=', auth()->user()->id);
        })->get();
        return view('dkp::list')->with('dkpList', $dkpList);

    }
}