<?php
/**
 * User: Yu Peng
 * Date: 2023-3-1
 * Remark: 本文件为DKP模块目录层级
 */

return [
    'dkp' => [
        'name' => 'DKP',
        'icon' => 'fas fa-rocket',
        'route_segment' => 'dkp',
        'permission' => 'dkp.request',
        'entries' => [
            [
                'name' => '我的DKP',
                'icon' => 'fas fa-medkit',
                'route' => 'dkp.minelist',
                'permission' => 'dkp.request',
            ],
            [
                'name' => 'DKP兑换',
                'icon' => 'fas fa-gavel',
                'route' => 'dkp.commodity',
                'permission' => 'srp.request',
            ],
            [
                'name' => 'DKP兑换流水',
                'icon' => 'fas fa-chart-bar',
                'route' => 'dkp.commodityInfo',
                'permission' => 'dkp.admin',
            ],
            [
                'name' => 'DKP兑换审批',
                'icon' => 'fas fa-chart-bar',
                'route' => 'dkp.approve',
                'permission' => 'dkp.admin',
            ],
            [
                'name' => 'DKP兑换补充',
                'icon' => 'fas fa-chart-bar',
                'route' => 'dkp.supplement',
                'permission' => 'dkp.admin',
            ],
            [
                'name' => '设置',
                'icon' => 'fas fa-cogs',
                'route' => 'dkp.settings',
                'permission' => 'dkp.admin',
            ],
        ],
    ],
];
