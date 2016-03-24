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
     * @inheritdoc
     */
    public function getClientByPlatformId($platformId)
    {
        $client = DatabaseClient::findOne([
            DatabaseClient::PLATFORM_ID_KEY => $platformId
        ]);
        return $client;
    }
}
