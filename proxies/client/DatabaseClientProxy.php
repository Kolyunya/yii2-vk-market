<?php

namespace app\proxies\client;

use app\models\client\DatabaseClient;
use app\proxies\client\BaseClientProxy;

/**
 *
 * @author Kolyunya
 */
class DatabaseClientProxy extends BaseClientProxy
{
    /**
     * @const string
     */
    const CLIENT_PLATFORM_ID_KEY = 'platform_id';

    /**
     * @inheritdoc
     */
    public function getClientByPlatformId($platformId)
    {
        $client = DatabaseClient::findOne([
            self::CLIENT_PLATFORM_ID_KEY => $platformId
        ]);
        return $client;
    }
}
