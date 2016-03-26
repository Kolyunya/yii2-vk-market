<?php

namespace app\actions\product;

use Yii;
use app\actions\BaseAction;
use app\responses\success\ProductInfoResponse;

/**
 *
 * @author Kolyunya
 */
class GetAction extends BaseAction
{
    /**
     * Product listener.
     * @var ProductListenerInterface
     */
    private $listener;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initializeListener();
    }

    /**
     * @inheritdoc
     */
    protected function getResponse()
    {
        $response = new ProductInfoResponse($this->product);
        return $response;
    }

    /**
     * @inheritdoc
     */
    protected function beforeRun()
    {
        $success = $this->listener->beforeRequest(
            $this->sender,
            $this->receiver,
            $this->product
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
        $this->listener->afterRequest(
            $this->sender,
            $this->receiver,
            $this->product
        );
        parent::afterRun();
    }

    /**
     * Initializes product listener.
     */
    private function initializeListener()
    {
        $this->listener = Yii::$app->productListener;
    }
}
