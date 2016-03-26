<?php

namespace app\responses\error;

use app\responses\ErrorResponse;

/**
 *
 * @author Kolyunya
 */
class CommonErrorResponse extends ErrorResponse
{
    /**
     * @const string
     */
    const DEFAULT_MESSAGE = 'Unknown error.';

    /**
     * Error message.
     * @var string
     */
    private $message;

    /**
     * Constructs a common error response.
     * @param string $message Error message.
     */
    public function __construct($message = self::DEFAULT_MESSAGE)
    {
        $this->message = $message;
    }

        /**
     * @inheritdoc
     */
    protected function getCode()
    {
        $code = 1;
        return $code;
    }

    /**
     * @inheritdoc
     */
    protected function getMessage()
    {
        $message = $this->message;
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
