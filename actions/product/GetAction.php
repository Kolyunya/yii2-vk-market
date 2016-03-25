<?php

namespace app\actions\product;

use Yii;
use app\actions\BaseAction;
use app\models\client\ClientInterface;
use app\responses\success\ProductInfoResponse;

/**
 *
 * @author Kolyunya
 */
class GetAction extends BaseAction
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
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initializeClients();
        $this->initializeProduct();
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
        $success = Yii::$app->productListener->beforeInfoRequest(
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
        Yii::$app->productListener->afterInfoRequest(
            $this->sender,
            $this->receiver,
            $this->product
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
}
