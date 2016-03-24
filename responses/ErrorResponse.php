<?php

namespace app\responses;

use app\responses\BaseResponse;

/**
 *
 * @author Kolyunya
 */
abstract class ErrorResponse extends BaseResponse
{
    /**
     * Error key.
     */
    const ERROR_KEY = 'error';

    /**
     * Error code key.
     */
    const CODE_KEY = 'error_code';

    /**
     * Error message key.
     */
    const MESSAGE_KEY = 'error_msg';

    /**
     * Error is critical key.
     */
    const IS_CRITICAL_KEY = 'critical';

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $errorKey = self::ERROR_KEY;
        $errorContent = $this->getErrorContent();
        $responseData = array(
            $errorKey => $errorContent
        );
        return $responseData;
    }

    /**
     * Returns error code.
     * @return integer
     */
    abstract protected function getCode();

    /**
     * Returns error message.
     * @return string
     */
    abstract protected function getMessage();

    /**
     * Indicates whether the error is critical or not.
     * @return boolean
     */
    abstract protected function isCritical();

    /**
     * Returns error data.
     * @return array Error data.
     */
    private function getErrorContent()
    {
        $errorData = array();

        // Add error code
        $codeKey = self::CODE_KEY;
        $codeValue = $this->getCode();
        $errorData[$codeKey] = $codeValue;

        // Add error message
        $messageKey = self::MESSAGE_KEY;
        $messageValue = $this->getMessage();
        $errorData[$messageKey] = $messageValue;

        // Add critical value
        $isCriticalKey = self::IS_CRITICAL_KEY;
        $isCriticalValue = $this->isCritical();
        $errorData[$isCriticalKey] = $isCriticalValue;

        return $errorData;
    }
}
