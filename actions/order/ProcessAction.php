<?php

namespace app\actions\order;

use Yii;
use app\actions\BaseAction;
use app\models\client\ClientInterface;
use app\responses\error\OrderProcessionFailedResponse;
use app\responses\success\OrderInfoResponse;

/**
 *
 * @author Kolyunya
 */
class ProcessAction extends BaseAction
{
    /**
     * Order sender.
     * @var ClientInterface
     */
    private $sender;

    /**
     * Order receiver.
     * @var ClientInterface
     */
    private $receiver;

    /**
     * Requested product.
     * @var ProductInterface
     */
    private $product;

    /**
     * Requested order.
     * @var OrderInterface
     */
    private $order;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initializeClients();
        $this->initializeProduct();
        $this->initializeOrder();
    }

    /**
     * @inheritdoc
     */
    protected function getResponse()
    {
        if ($this->order === null) {
            $response = new OrderProcessionFailedResponse();
        } else {
            $response = new OrderInfoResponse($this->order);
        }
        return $response;
    }

    /**
     * @inheritdoc
     */
    protected function beforeRun()
    {
        $success = Yii::$app->orderListener->beforeOrderProcession(
            $this->sender,
            $this->receiver,
            $this->product,
            $this->order
        );
        if ($success === false) {
            $this->sendCommonErrorResponse();
            return false;
        }
        return parent::beforeRun();
    }

    /**
     * @inheritdoc
     */
    protected function afterRun()
    {
        Yii::$app->orderListener->afterOrderProcession(
            $this->sender,
            $this->receiver,
            $this->product,
            $this->order
        );
        parent::afterRun();
    }

    /**
     * Initializes client requested a product.
     */
    private function initializeClients()
    {
        $clientProxy = Yii::$app->clientProxy;
        $this->sender = $clientProxy->getCurrentSender();
        $this->receiver = $clientProxy->getCurrentReceiver();
    }

    /**
     * Initializes requested product.
     */
    private function initializeProduct()
    {
        $productProxy = Yii::$app->productProxy;
        $this->product = $productProxy->getCurrentProduct();
    }

    /**
     * Initializes requested order.
     */
    private function initializeOrder()
    {
        $orderProxy = Yii::$app->orderProxy;
        $orderId = Yii::$app->requestParser->getOrderId();
        $this->order = $orderProxy->getOrderByPlatformId($orderId);
        if ($this->order === null) {
            $this->order = $orderProxy->createOrder(
                $orderId,
                $this->sender,
                $this->receiver,
                $this->product
            );
        }
    }
}
