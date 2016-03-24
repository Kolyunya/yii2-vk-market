<?php

namespace app\actions\market;

use Yii;
use yii\base\Action;

/**
 *
 * @author Kolyunya
 */
class IndexAction extends Action
{
    /**
     * @const array
     */
    const GET_PRODUCT_INFO_REQUEST_TYPE = array(
        'get_item',
        'get_item_test',
    );

    /**
     * @const array
     */
    const GET_ORDER_INFO_REQUEST_TYPE = array(
        'order_status_change',
        'order_status_change_test',
    );

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->isGetProductInfoRequest()) {
            return $this->controller->run('product/get-info');
        } elseif ($this->isGetOrderInfoRequest()) {
            return $this->controller->run('order/get-info');
        }
    }

    /**
     * @return boolean
     */
    private function isGetProductInfoRequest()
    {
        $requestType = Yii::$app->requestParser->getRequestType();
        $isGetProductInfoRequest = in_array(
            $requestType,
            self::GET_PRODUCT_INFO_REQUEST_TYPE
        );
        return $isGetProductInfoRequest;
    }

    /**
     * @return boolean
     */
    private function isGetOrderInfoRequest()
    {
        $requestType = Yii::$app->requestParser->getRequestType();
        $isGetOrderInfoRequest = in_array(
            $requestType,
            self::GET_ORDER_INFO_REQUEST_TYPE
        );
        return $isGetOrderInfoRequest;
    }
}
