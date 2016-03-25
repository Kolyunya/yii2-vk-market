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
    const GET_PRODUCT_REQUEST_TYPE = array(
        'get_item',
        'get_item_test',
    );

    /**
     * @const array
     */
    const PROCESS_ORDER_REQUEST_TYPE = array(
        'order_status_change',
        'order_status_change_test',
    );

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->isGetProductRequest()) {
            return $this->controller->run('product/get');
        } elseif ($this->isProcessOrderRequest()) {
            return $this->controller->run('order/process');
        }
    }

    /**
     * @return boolean
     */
    private function isGetProductRequest()
    {
        $requestType = Yii::$app->requestParser->getRequestType();
        $isGetProductRequest = in_array(
            $requestType,
            self::GET_PRODUCT_REQUEST_TYPE
        );
        return $isGetProductRequest;
    }

    /**
     * @return boolean
     */
    private function isProcessOrderRequest()
    {
        $requestType = Yii::$app->requestParser->getRequestType();
        $isProcessOrderRequest = in_array(
            $requestType,
            self::PROCESS_ORDER_REQUEST_TYPE
        );
        return $isProcessOrderRequest;
    }
}
