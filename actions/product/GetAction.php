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
}
