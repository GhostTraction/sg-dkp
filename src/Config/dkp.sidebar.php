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
                'route' => 'dkpmine.list',
                'permission' => 'dkp.request',
            ],
            [
                'name' => 'DKP兑换',
                'icon' => 'fas fa-gavel',
                'route' => 'dkpcommodity.list',
                'permission' => 'srp.request',
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
