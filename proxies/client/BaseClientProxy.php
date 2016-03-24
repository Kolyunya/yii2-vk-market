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
}
