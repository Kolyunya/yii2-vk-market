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
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initializeClient();
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
            $this->client,
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
            $this->client,
            $this->product
        );
        parent::afterRun();
    }

    /**
     * Initializes client requested a product.
     */
    private function initializeClient()
    {
        $clientProxy = Yii::$app->clientProxy;
        $this->client = $clientProxy->getCurrentSender();
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
