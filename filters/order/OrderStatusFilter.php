<?php

namespace app\filters\order;

use Yii;
use app\filters\BaseFilter;
use app\responses\error\InvalidOrderStatusResponse;

/**
 * This filter ensures that the order status is valid.
 *
 * @author Kolyunya
 */
class OrderStatusFilter extends BaseFilter
{
    /**
     * @const array
     */
    const VALID_ORDER_STATUSES = array(
        'chargeable',
    );

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $orderStatusIsValid = $this->validateOrderStatus();
        if ($orderStatusIsValid === false) {
            $this->sendInvalidOrderStatusResponse();
        }
        return $orderStatusIsValid;
    }

    /**
     * Indicates whether the order status is valid or not.
     * @return boolean Returns true if the order status is valid.
     *                 Returns false otherwise.
     */
    private function validateOrderStatus()
    {
        $orderStatus = Yii::$app->request->getOrderStatus();
        $orderStatuses = self::VALID_ORDER_STATUSES;
        $orderStatusIsValid = in_array($orderStatus, $orderStatuses);
        return $orderStatusIsValid;
    }

    /**
     * Sends invalid order status response to the client.
     */
    private function sendInvalidOrderStatusResponse()
    {
        $invalidOrderStatusResponse = new InvalidOrderStatusResponse();
        $this->setResponse($invalidOrderStatusResponse);
    }
}
