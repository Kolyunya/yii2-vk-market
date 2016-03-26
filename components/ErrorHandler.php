<?php

namespace app\components;

use Yii;
use app\responses\error\CommonErrorResponse;

/**
 *
 * @author Kolyunya
 */
class ErrorHandler extends \yii\web\ErrorHandler
{
    /**
     * @inheritdoc
     */
    protected function renderException($exception)
    {
        $message = $exception->getMessage();
        $response = new CommonErrorResponse($message);
        Yii::$app->response->content = $response;
        Yii::$app->response->send();
    }
}
