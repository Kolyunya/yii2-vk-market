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
     * Current client.
     * @var ClientInterface
     */
    private $client;

    /**
     * Current receiver.
     * @var ClientInterface
     */
    private $receiver;

    /**
     * @inheritdoc
     */
    public function getCurrentClient()
    {
        if ($this->client === null) {
            $clientId = Yii::$app->requestParser->getClientId();
            $this->client = $this->getClientByPlatformId($clientId);
        }
        return $this->client;
    }

    /**
     * @inheritdoc
     */
    public function getCurrentReceiver()
    {
        if ($this->receiver === null) {
            $receiverId = Yii::$app->requestParser->getReceiverId();
            $this->receiver = $this->getClientByPlatformId($receiverId);
        }
        return $this->receiver;
    }
}
