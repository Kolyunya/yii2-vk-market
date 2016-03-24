<?php

namespace app\responses;

use yii\helpers\Json;
use app\responses\ResponseInterface;

/**
 * Base class for all server responses.
 *
 * @author Kolyunya
 */
abstract class BaseResponse implements ResponseInterface
{
    /**
     * @inheritdoc
     */
    abstract public function getData();

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        $responseData = $this->getData();
        $responseString = Json::encode($responseData);
        return $responseString;
    }
}
