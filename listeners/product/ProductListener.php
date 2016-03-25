<?php

namespace app\listeners\product;

use yii\base\Component;
use app\listeners\product\ProductListenerInterface;
use app\models\client\ClientInterface;
use app\models\product\ProductInterface;

/**
 *
 * @author Kolyunya
 */
class ProductListener extends Component implements ProductListenerInterface
{
    /**
     * @inheritdoc
     */
    public function beforeRequest(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product
    ) {
        // Put your code here

        return true;
    }

    /**
     * @inheritdoc
     */
    public function afterRequest(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product
    ) {
        // Put your code here

    }
}
