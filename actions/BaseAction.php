<?php

namespace app\actions;

use Yii;
use yii\base\Action;
use app\responses\error\CommonErrorResponse;

/**
 *
 * @author Kolyunya
 */
abstract class BaseAction extends Action
{
    /**
     * Order sender.
     * @var ClientInterface
     */
    protected $sender;

    /**
     * Order receiver.
     * @var ClientInterface
     */
    protected $receiver;

    /**
     * Requested product.
     * @var ProductInterface
     */
    protected $product;

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
    public function run()
    {
        $response = $this->getResponse();
        $responseData = $response->getData();
        return $responseData;
    }

    /**
     * Sends common error response to the client.
     */
    protected function setCommonErrorResponse()
    {
        $response = new CommonErrorResponse();
        Yii::$app->response->content = $response;
    }

    /**
     * @return ResponseInterface Response.
     */
    abstract protected function getResponse();

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
