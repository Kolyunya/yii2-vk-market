<?php

namespace app\proxies\order;

use yii\db\Exception;
use app\models\order\DatabaseOrder;
use app\proxies\order\BaseOrderProxy;

/**
 *
 * @author Kolyunya
 */
class DatabaseOrderProxy extends BaseOrderProxy
{
    /**
     * @inheritdoc
     */
    public function getOrderByPlatformId($platformId)
    {
        $order = DatabaseOrder::findOne([
            DatabaseOrder::PLATFORM_ID_KEY => $platformId
        ]);
        return $order;
    }

    /**
     * @inheritdoc
     */
    public function createOrder($orderId, $sender, $receiver, $product)
    {
        $order = new DatabaseOrder();
        $order->setAttribute(
            DatabaseOrder::PLATFORM_ID_KEY,
            $orderId
        );
        $order->setAttribute(
            DatabaseOrder::SENDER_ID_KEY,
            $sender->getLocalId()
        );
        $order->setAttribute(
            DatabaseOrder::RECEIVER_ID_KEY,
            $receiver->getLocalId()
        );
        $order->setAttribute(
            DatabaseOrder::PRODUCT_ID_KEY,
            $product->getId()
        );
        $order->setAttribute(
            DatabaseOrder::IS_PROCESSED_KEY,
            false
        );
        if (!$order->save()) {
            throw new Exception('Could not create order.');
        }
        return $order;
    }
}
