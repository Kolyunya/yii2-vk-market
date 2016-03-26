<?php

namespace app\listeners\order;

use yii\base\Component;
use app\listeners\order\OrderListenerInterface;
use app\models\client\ClientInterface;
use app\models\order\OrderInterface;
use app\models\product\ProductInterface;

/**
 *
 * @author Kolyunya
 */
class OrderListener extends Component implements OrderListenerInterface
{
    /**
     * @inheritdoc
     */
    public function beforeProcession(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product,
        OrderInterface $order
    ) {
        // Put your code here.

        return true;
    }

    /**
     * @inheritdoc
     */
    public function process(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product,
        OrderInterface $order
    ) {
        // Put your code here.

        return true;
    }

    /**
     * @inheritdoc
     */
    public function afterProcession(
        ClientInterface $sender,
        ClientInterface $receiver,
        ProductInterface $product,
        OrderInterface $order
    ) {
        // Put your code here.

    }
}
