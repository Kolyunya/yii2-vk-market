<?php

namespace app\responses\error;

use app\responses\ErrorResponse;

/**
 *
 * @author Kolyunya
 */
class OrderProcessionFailedResponse extends ErrorResponse
{
    /**
     * @inheritdoc
     */
    protected function getCode()
    {
        $code = 2;
        return $code;
    }

    /**
     * @inheritdoc
     */
    protected function getMessage()
    {
        $message = 'Order procession failed.';
        return $message;
    }

    /**
     * @inheritdoc
     */
    protected function isCritical()
    {
        $isCritical = false;
        return $isCritical;
    }
}
