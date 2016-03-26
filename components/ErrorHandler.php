<?php

namespace app\components;

use Yii;
use Exception;
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
        $message =
            YII_DEBUG === true ?
            $this->constructMessage($exception) :
            null;
        $response = new CommonErrorResponse($message);
        Yii::$app->response->content = $response;
        Yii::$app->response->send();
    }

    /**
     * Constructs an error message.
     * @return string
     */
    private function constructMessage(Exception $exception)
    {
        $message = $exception->getMessage();
        $message .= ' in file ' . $exception->getFile();
        $message .= ' at line ' . $exception->getLine();
        return $message;
    }
}
