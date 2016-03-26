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
     * Order listener.
     * @var OrderListenerInterface
     */
    private $listener;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initializeOrder();
        $this->initializeListener();
    }

    /**
     * @inheritdoc
     */
    protected function getResponse()
    {
        $success = $this->processOrder();
        if ($success === false) {
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
        $success = $this->listener->beforeProcession(
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
        $this->listener->afterProcession(
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
        $this->order = $orderProxy->getCurrentOrder();
    }

    /**
     * Initializes order listener
     */
    private function initializeListener()
    {
        $this->listener = Yii::$app->orderListener;
    }

    /**
     * Processes current order.
     * @return boolean Indicates whether order procession succeeded or not.
     */
    private function processOrder()
    {
        // Check if order was already processed.
        $orderIsAlreadyProcessed = $this->order->isProcessed();
        if ($orderIsAlreadyProcessed === true) {
            return true;
        }

        // Perform order procession
        $orderProcessed = $this->listener->process(
            $this->sender,
            $this->receiver,
            $this->product,
            $this->order
        );
        if ($orderProcessed === false) {
            return false;
        }

        // Save order processed status
        $orderStatusSaved = $this->order->setProcessed();
        if ($orderStatusSaved === false) {
            return false;
        }

        // Order processed successfully.
        return true;
    }
}
