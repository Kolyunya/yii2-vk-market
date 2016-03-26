<?php

namespace app\proxies\client;

use Yii;
use yii\base\Component;
use app\proxies\client\ClientProxyInterface;

/**
 *
 * @author Kolyunya
 */
abstract class BaseClientProxy extends Component implements ClientProxyInterface
{
    /**
     * Current sender.
     * @var ClientInterface
     */
    private $sender;

    /**
     * Current receiver.
     * @var ClientInterface
     */
    private $receiver;

    /**
     * @inheritdoc
     */
    public function getCurrentSender()
    {
        if ($this->sender === null) {
            $senderId = Yii::$app->request->getSenderId();
            $this->sender = $this->getClientByPlatformId($senderId);
        }
        return $this->sender;
    }

    /**
     * @inheritdoc
     */
    public function getCurrentReceiver()
    {
        if ($this->receiver === null) {
            $receiverId = Yii::$app->request->getReceiverId();
            $this->receiver = $this->getClientByPlatformId($receiverId);
        }
        return $this->receiver;
    }
}
