<?php

namespace app\proxies\order;

/**
 *
 * @author Kolyunya
 */
interface OrderProxyInterface
{
    /**
     * Retrieves an order by its platform id.
     * @param integer $platformId Order's platform id.
     * @return OrderInterface Order.
     */
    public function getOrderByPlatformId($platformId);

    /**
     * Saves order.
     * @param integer $orderId
     * @param ClientInterface $client
     * @param ProductInterface $product
     * @return OrderInterface Order.
     */
    public function createOrder($orderId, $client, $product);
}
