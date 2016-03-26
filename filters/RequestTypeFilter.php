<?php

namespace app\filters;

use Yii;
use app\filters\BaseFilter;
use app\responses\error\InvalidRequestTypeResponse;

/**
 * This filter ensures that request type is supported.
 *
 * @author Kolyunya
 */
class RequestTypeFilter extends BaseFilter
{
    /**
     * Supported request types
     * @var array
     */
    const SUPPORTED_REQUEST_TYPES = array(
        'get_item',
        'get_item_test',
        'order_status_change',
        'order_status_change_test',
    );

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $requestTypeIsSupported = $this->validateRequestType();
        if ($requestTypeIsSupported === false) {
            $this->sendInvalidRequestTypeResponse();
        }
        return $requestTypeIsSupported;
    }

    /**
     * Indicates if recieved request type is supported.
     * @return boolean Returns true if provided request type is supported.
     *                 Returns false otherwise.
     */
    private function validateRequestType()
    {
        $supportedArrayTypes = self::SUPPORTED_REQUEST_TYPES;
        $requestType = Yii::$app->request->getRequestType();
        $requestTypeIsSupported = in_array($requestType, $supportedArrayTypes);
        return $requestTypeIsSupported;
    }

    /**
     * Sends invalid request type response to the client.
     */
    private function sendInvalidRequestTypeResponse()
    {
        $invalidRequestTypeResponse = new InvalidRequestTypeResponse();
        $this->setResponse($invalidRequestTypeResponse);
    }
}
