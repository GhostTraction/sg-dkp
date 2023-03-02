@extends('web::layouts.grids.12')

@section('title', 'DKP')
@section('page_header', trans('dkp::dkp.list'))

@push('head')
    <link rel="stylesheet"
          type="text/css"
          href="https://snoopy.crypta.tech/snoopy/seat-srp-approval.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/denngarr-srp-hook.css') }}"/>
@endpush

@section('full')
    <div class="card card-primary card-solid">
        <div class="card-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">DKP</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">我的兑换</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="srps" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>角色名</th>
                                <th>DKP</th>
                                <th>获取时间</th>
                                <th>获取原由</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dkpList as $dkp)
                                @if(($dkp->status == 1))
                                    <tr>
                                        <td>
                                            {{$dkp->character_id}}
                                        </td>
                                        <td>
                                            {{$dkp->score}}
                                        </td>
                                        <td data-order="{{ strtotime($dkp->created_at) }}>
                      <span data-toggle=" tooltip
                                        " data-placement="top" title="{{ $dkp->created_at }}
                                        ">{{ human_diff($dkp->created_at) }}</span>
                                        </td>
                                        <td>
                                            {{$dkp->remark}}
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <table id="srps-arch" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>角色名</th>
                                <th>花费DKP</th>
                                <th>兑换时间</th>
                                <th>兑换物品</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dkpList as $dkp)
                                @if(($dkp->status == 2))
                                    <tr>
                                        <td>
                                            {{$dkp->character_id}}
                                        </td>
                                        <td>
                                            {{$dkp->score}}
                                        </td>
                                        <td data-order="{{ strtotime($dkp->created_at) }}>
                      <span data-toggle=" tooltip
                                        " data-placement="top" title="{{ $dkp->created_at }}
                                        ">{{ human_diff($dkp->created_at) }}</span>
                                        </td>
                                        <td>
                                            {{$dkp->remark}}
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop