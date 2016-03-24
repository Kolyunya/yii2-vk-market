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
        $response = new CommonErrorResponse();
        Yii::$app->response->content = $response;
        Yii::$app->response->send();
    }
}
