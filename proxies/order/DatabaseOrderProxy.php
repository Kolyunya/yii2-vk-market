<?php

namespace app\proxies\order;

use app\models\order\DatabaseOrder;
use app\proxies\order\BaseOrderProxy;

/**
 *
 * @author Kolyunya
 */
class DatabaseOrderProxy extends BaseOrderProxy
{
    /**
     * @const string
     */
    const ORDER_PLATFORM_ID_KEY = 'platform_id';

    /**
     * @inheritdoc
     */
    public function getOrderByPlatformId($platformId)
    {
        $order = DatabaseOrder::findOne([
            self::ORDER_PLATFORM_ID_KEY => $platformId
        ]);
        return $order;
    }

    /**
     * @inheritdoc
     */
    public function createOrder($orderId, $client, $product)
    {
        $order = new DatabaseOrder();
        $order->platform_id = $orderId;
        $order->player_id = $client->getLocalId();
        $order->good_id = $product->getId();
        $order->paid_at = date("Y-m-d H:i:s");
        $order->save();
        return $order;
    }
}
