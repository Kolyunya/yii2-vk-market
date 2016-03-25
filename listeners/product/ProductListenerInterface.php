<?php

namespace app\listeners\product;

use app\models\client\ClientInterface;
use app\models\product\ProductInterface;

/**
 *
 * @author Kolyunya
 */
interface ProductListenerInterface
{
    /**
     * Called before product info was requested.
     * @param ClientInterface $sender Product sender.
     * @param ClientInterface $receiver Product receiver.
     * @param ProductInterface $product Product.
     * @return boolean Whether to respond to the request or not.
     */
    public function beforeInfoRequest(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product
    );

    /**
     * Called after product info was requested.
     * @param ClientInterface $sender Product sender.
     * @param ClientInterface $receiver Product receiver.
     * @param ProductInterface $product Product.
     */
    public function afterInfoRequest(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product
    );
}
