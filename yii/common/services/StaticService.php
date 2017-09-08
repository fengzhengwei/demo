<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/8/15
 * Time: 9:21
 */
namespace common\services;

use yii\web\Controller;
use Yii;

class StaticService
{
    public static $default = '-1';
    public static $order = [
        '0' => '正常订单',
        '1' => '活动订单',
        '2' => '促销订单',
        '3' => '订单关闭',
    ];
}