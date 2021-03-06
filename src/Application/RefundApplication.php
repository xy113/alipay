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
 * Time: 2:08 上午
 */

namespace Alipay\Application;


class RefundApplication extends AlipayApplication
{
    /**
     * 退款, 必填参数:trade_no||out_trade_no
     * @param $payContent
     * @return array
     */
    public function sendRequest($bizContent)
    {
        $this->setBizContent($bizContent);
        $this->setMethod('alipay.trade.refund');
        $this->makeSign();
        return $this->postData($this->params);
    }
}
