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
    protected function sendCommonErrorResponse()
    {
        $response = new CommonErrorResponse();
        Yii::$app->response->content = $response;
    }

    /**
     * @return ResponseInterface Response.
     */
    abstract protected function getResponse();
}
