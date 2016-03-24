<?php

namespace app\listeners\order;

use app\models\client\ClientInterface;
use app\models\order\OrderInterface;
use app\models\product\ProductInterface;

/**
 *
 * @author Kolyunya
 */
interface OrderListenerInterface
{
    /**
     * Called before order procession.
     * @param ClientInterface $client
     * @param ProductInterface $product
     * @param OrderInterface $order
     * @return boolean Whether to respond to the request or not.
     */
    public function beforeOrderProcession(
        ClientInterface $client,
        ProductInterface $product,
        OrderInterface $order
    );

    /**
     * Called after order procession.
     * @param ClientInterface $client
     * @param ProductInterface $product
     * @param OrderInterface $order
     */
    public function afterOrderProcession(
        ClientInterface $client,
        ProductInterface $product,
        OrderInterface $order
    );
}
