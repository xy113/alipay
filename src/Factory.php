<?php
/**
 * ============================================================================
 * Copyright (c) 2015-2020 贵州大师兄信息技术有限公司 All rights reserved.
 * siteַ: https://www.gzdsx.cn
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0.0
 * ---------------------------------------------
 * Date: 2020/4/28
 * Time: 1:25 上午
 */

namespace Alipay;

/**
 * Class Factory
 * @package Alipay
 * @method static \Alipay\Application\PagePayApplication pagePay($config = []) 网页支付
 * @method static \Alipay\Application\AppPayApplication appPay($config = []) app支付
 * @method static \Alipay\Application\QueryApplication query($config = []) 订单查询
 * @method static \Alipay\Application\CloseApplication close($config = []) 关闭订单
 * @method static \Alipay\Application\RefundApplication refund($config = []) 退款
 * @method static \Alipay\Application\RefundQueryApplication refundQuery($config = []) 退款查询
 */
class Factory
{
    private static $appMap = [
        'pagePay' => \Alipay\Application\PagePayApplication::class,
        'appPay' => \Alipay\Application\AppPayApplication::class,
        'query' => \Alipay\Application\QueryApplication::class,
        'close' => \Alipay\Application\CloseApplication::class,
        'refund' => \Alipay\Application\RefundApplication::class,
        'refundQuery' => \Alipay\Application\RefundQueryApplication::class,
    ];

    /**
     * @param $name
     * @param array $config
     * @return mixed
     */
    public static function make($name, $config = [])
    {
        $application = self::$appMap[$name];
        return new $application($config);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
