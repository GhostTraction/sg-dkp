<?php

namespace Dkp\Seat\SeatDKP\Http\Controllers;

use Dkp\Seat\SeatDKP\Models\DkpInfo;
use Seat\Web\Http\Controllers\Controller;

class DkpController extends Controller
{
    /**
     * 获取个人dkp
     */
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


    /**
     * 分类统计账号dkp
     * @return void
     */
    public function getCommodityInfo()
    {
        $dkpList = DkpInfo::join('users', 'users.id', '=', 'dkp_info.user_id')
            ->leftjoin('user_settings_view', 'user_settings_view.user_id', '=', 'dkp_info.user_id')
            ->get();
        #所有角色的总分
        $allDkpList = array();
        #所有角色花费的分数
        $useDkpList = array();
        #userid对应的name(nickname)
        $userNicknameList = array();
        foreach ($dkpList as $dkp) {
            $userId = $dkp->id;
            $score = $dkp->score;
            $status = $dkp->status;
            $name = $dkp->name;
            $nickname = $dkp->value;
            if ($status == 1) {
                if (array_key_exists($userId, $allDkpList)) {
                    $allDkpList[$userId] += $score;

                } else {
                    $allDkpList[$userId] = $score;
                }
            } else if ($status == 3) {
                if (array_key_exists($userId, $useDkpList)) {
                    $useDkpList[$userId] += $score;

                } else {
                    $useDkpList[$userId] = $score;
                }
            }
            if (!array_key_exists($userId, $userNicknameList)) {
                if (!empty($nickname)) {
                    $userNicknameList[$userId] = $name . "(" . $nickname . ")";
                } else {
                    $userNicknameList[$userId] = $name;
                }
            }
        }
        $resultDkpList = array();
        foreach ($allDkpList as $alldkp => $allscore) {
            $tempDkp = array();
            $tempDkp['user_id'] = $alldkp;
            $tempDkp['name'] = $userNicknameList[$alldkp];
            $tempDkp['all_score'] = $allscore;
            if (array_key_exists($alldkp, $useDkpList)) {
                $tempDkp['use_score'] = $useDkpList[$alldkp];
            } else {
                $tempDkp['use_score'] = 0;
            }
            $resultDkpList[] = $tempDkp;
        }

        return view('dkp::commodityList')->with('allDkpList', json_encode($resultDkpList, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 根据userid获取该用户dkp累加详情
     * @return void
     */
    public function allScoreDetail($userId)
    {
        $userScoreDetail = DkpInfo::join('character_infos', 'character_infos.character_id', '=', 'dkp_info.character_id')
            ->where('dkp_info.user_id', '=', $userId)
            ->where('dkp_info.status', '=', '1')
            ->get();
        return view('dkp::detail.allScoreDetail')->with('userScoreDetail', json_encode($userScoreDetail, JSON_UNESCAPED_UNICODE));
    }


    /**
     * 该用户使用dkp的详情（不包含锁定的）
     * @param $userId
     * @return mixed
     */
    public function useScoreDetail($userId)
    {
        $userScoreDetail = DkpInfo::join('character_infos', 'character_infos.character_id', '=', 'dkp_info.character_id')
            ->where('dkp_info.user_id', '=', $userId)
            ->where('dkp_info.status', '=', '3')
            ->get();
        return view('dkp::detail.allScoreDetail')->with('userScoreDetail', json_encode($userScoreDetail, JSON_UNESCAPED_UNICODE));
    }
}