<?php

namespace app\responses\error;

use app\responses\ErrorResponse;

/**
 *
 * @author Kolyunya
 */
class InvalidOrderStatusResponse extends ErrorResponse
{
    /**
     * @inheritdoc
     */
    protected function getCode()
    {
        $code = 100;
        return $code;
    }

    /**
     * @inheritdoc
     */
    protected function getMessage()
    {
        $message = 'Invalid order status.';
        return $message;
    }

    /**
     * @inheritdoc
     */
    protected function isCritical()
    {
        $isCritical = true;
        return $isCritical;
    }
}
