<?php

namespace app\filters;

use Yii;
use app\filters\BaseFilter;
use app\responses\error\InvalidClientResponse;

/**
 * This filter ensures that sender and receiver exist.
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
        $senderExists = $this->validateSenderExistence();
        $receiverExists = $this->validateReceiverExistence();
        $usersExist = $senderExists && $receiverExists;
        if ($usersExist === false) {
            $this->sendInvalidClientResponse();
        }
        return $usersExist;
    }

    /**
     * Indicates whether the sender exists.
     * @return boolean Returns true if the sender exists.
     *                 Returns false otherwise.
     */
    private function validateSenderExistence()
    {
        $sender = Yii::$app->clientProxy->getCurrentSender();
        $senderExists = $sender !== null;
        return $senderExists;
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
        $this->setResponse($invalidClientResponse);
    }
}
