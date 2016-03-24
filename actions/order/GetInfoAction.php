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
class GetInfoAction extends BaseAction
{
    /**
     * Client requested the product.
     * @var ClientInterface
     */
    private $client;

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
        $this->initializeClient();
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
            $this->client,
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
            $this->client,
            $this->product,
            $this->order
        );
        parent::afterRun();
    }

    /**
     * Initializes client requested a product.
     */
    private function initializeClient()
    {
        $clientProxy = Yii::$app->clientProxy;
        $this->client = $clientProxy->getCurrentClient();
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
                $this->client,
                $this->product
            );
        }
    }
}