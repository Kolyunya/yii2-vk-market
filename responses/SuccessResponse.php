<?php

namespace app\responses;

use app\responses\BaseResponse;

/**
 *
 * @author Kolyunya
 */
abstract class SuccessResponse extends BaseResponse
{
    /**
     * Error key.
     */
    const RESPONSE_KEY = 'response';

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $responseKey = self::RESPONSE_KEY;
        $responseContent = $this->getResponseContent();
        $responseData = array(
            $responseKey => $responseContent
        );
        return $responseData;
    }

    /**
     * Returns response content.
     * @return array Response content.
     */
    abstract protected function getResponseContent();
}
