<?php

namespace app\actions\order;

use Yii;
use app\actions\BaseAction;
use app\responses\error\OrderProcessionFailedResponse;
use app\responses\success\OrderInfoResponse;

/**
 *
 * @author Kolyunya
 */
class ProcessAction extends BaseAction
{
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
        $success = Yii::$app->orderListener->beforeProcession(
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
        Yii::$app->orderListener->afterProcession(
            $this->sender,
            $this->receiver,
            $this->product,
            $this->order
        );
        parent::afterRun();
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
