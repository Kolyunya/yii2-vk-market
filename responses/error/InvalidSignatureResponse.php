<?php

namespace app\responses\error;

use app\responses\ErrorResponse;

/**
 *
 * @author Kolyunya
 */
class InvalidSignatureResponse extends ErrorResponse
{
    /**
     * @inheritdoc
     */
    protected function getCode()
    {
        $code = 10;
        return $code;
    }

    /**
     * @inheritdoc
     */
    protected function getMessage()
    {
        $message = 'Invalid request signature.';
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
