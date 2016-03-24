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
     * @param ClientInterface $client Client.
     * @param ProductInterface $product Product.
     * @return boolean Whether to respond to the request or not.
     */
    public function beforeInfoRequest(
        ClientInterface $client,
        ProductInterface $product
    );

    /**
     * Called after product info was requested.
     * @param ClientInterface $client Client.
     * @param ProductInterface $product Product.
     */
    public function afterInfoRequest(
        ClientInterface $client,
        ProductInterface $product
    );
}
