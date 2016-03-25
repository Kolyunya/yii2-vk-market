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
     * @param ClientInterface $sender
     * @param ClientInterface $receiver
     * @param ProductInterface $product
     * @param OrderInterface $order
     * @return boolean Whether to respond to the request or not.
     */
    public function beforeProcession(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product,
        OrderInterface $order
    );

    /**
     * Called after order procession.
     * @param ClientInterface $sender
     * @param ClientInterface $receiver
     * @param ProductInterface $product
     * @param OrderInterface $order
     */
    public function afterProcession(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product,
        OrderInterface $order
    );
}
