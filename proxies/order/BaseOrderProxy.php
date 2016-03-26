<?php

namespace app\proxies\order;

use Yii;
use yii\base\Component;
use app\proxies\order\OrderProxyInterface;

/**
 *
 * @author Kolyunya
 */
abstract class BaseOrderProxy extends Component implements OrderProxyInterface
{
    /**
     * Current order.
     * @var OrderInterface
     */
    private $order;

    /**
     * @inheritdoc
     */
    public function getCurrentOrder()
    {
        if ($this->order === null) {
            $this->initializeOrder();
        }
        return $this->order;
    }

    /**
     * Initializes current order.
     */
    private function initializeOrder()
    {
        $orderId = Yii::$app->request->getOrderId();
        $this->order = $this->getOrderByPlatformId($orderId);
        if ($this->order === null) {
            $orderId = Yii::$app->request->getOrderId();
            $sender = Yii::$app->clientProxy->getCurrentSender();
            $receiver = Yii::$app->clientProxy->getCurrentReceiver();
            $product = Yii::$app->productProxy->getCurrentProduct();
            $this->order = $this->createOrder(
                $orderId,
                $sender,
                $receiver,
                $product
            );
        }
    }
}
