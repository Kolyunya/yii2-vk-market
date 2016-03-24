<?php

namespace app\responses\error;

use app\responses\ErrorResponse;

/**
 *
 * @author Kolyunya
 */
class InvalidProductResponse extends ErrorResponse
{
    /**
     * @inheritdoc
     */
    protected function getCode()
    {
        $code = 20;
        return $code;
    }

    /**
     * @inheritdoc
     */
    protected function getMessage()
    {
        $message = 'Product does not exist.';
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
