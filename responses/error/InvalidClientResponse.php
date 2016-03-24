<?php

namespace app\responses\error;

use app\responses\ErrorResponse;

/**
 *
 * @author Kolyunya
 */
class InvalidClientResponse extends ErrorResponse
{
    /**
     * @inheritdoc
     */
    protected function getCode()
    {
        $code = 22;
        return $code;
    }

    /**
     * @inheritdoc
     */
    protected function getMessage()
    {
        $message = 'Client does not exist.';
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
