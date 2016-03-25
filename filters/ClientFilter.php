<?php

namespace app\filters;

use Yii;
use app\filters\BaseFilter;
use app\responses\error\InvalidClientResponse;

/**
 * This filter ensures that request type is supported.
 *
 * @author Kolyunya
 */
class ClientFilter extends BaseFilter
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $clientExists = $this->validateClientExistence();
        $receiverExists = $this->validateReceiverExistence();
        $usersExist = $clientExists && $receiverExists;
        if ($usersExist === false) {
            $this->sendInvalidClientResponse();
        }
        return $usersExist;
    }

    /**
     * Indicates whether the client exists.
     * @return boolean Returns true if the client exists.
     *                 Returns false otherwise.
     */
    private function validateClientExistence()
    {
        $client = Yii::$app->clientProxy->getCurrentClient();
        $clientExists = $client !== null;
        return $clientExists;
    }

    /**
     * Indicates whether the receiver exists.
     * @return boolean Returns true if the receiver exists.
     *                 Returns false otherwise.
     */
    private function validateReceiverExistence()
    {
        $receiver = Yii::$app->clientProxy->getCurrentReceiver();
        $receiverExists = $receiver !== null;
        return $receiverExists;
    }

    /**
     * Sends invalid request type response to the client.
     */
    private function sendInvalidClientResponse()
    {
        $invalidClientResponse = new InvalidClientResponse();
        $this->sendResponse($invalidClientResponse);
    }
}
