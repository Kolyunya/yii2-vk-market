<?php

namespace app\proxies\order;

/**
 *
 * @author Kolyunya
 */
interface OrderProxyInterface
{
    /**
     * Returns current order.
     * @return OrderInterface Current order.
     */
    public function getCurrentOrder();

    /**
     * Retrieves an order by its platform id.
     * @param integer $platformId Order's platform id.
     * @return OrderInterface Order.
     */
    public function getOrderByPlatformId($platformId);

    /**
     * Saves order.
     * @param integer $orderId
     * @param ClientInterface $sender
     * @param ClientInterface $receiver
     * @param ProductInterface $product
     * @return OrderInterface Order.
     */
    public function createOrder($orderId, $sender, $receiver, $product);
}
