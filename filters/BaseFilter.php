<?php

namespace app\filters;

use Yii;
use yii\base\ActionFilter;
use app\responses\ResponseInterface;

/**
 *
 * @author Kolyunya
 */
class BaseFilter extends ActionFilter
{
    /**
     * Sends response to the client.
     */
    protected function setResponse(ResponseInterface $response)
    {
        Yii::$app->response->content = $response;
    }
}
