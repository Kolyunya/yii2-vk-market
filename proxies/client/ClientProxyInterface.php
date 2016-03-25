<?php

namespace app\proxies\client;

/**
 *
 * @author Kolyunya
 */
interface ClientProxyInterface
{
    /**
     * Returns current client.
     * @return ClientInterface Client.
     */
    public function getCurrentClient();

    /**
     * Returns current receiver.
     * @return ClientInterface Receiver.
     */
    public function getCurrentReceiver();

    /**
     * Returns client by his platform id.
     * @param integer $platformId
     * @return ClientInterface Client.
     */
    public function getClientByPlatformId($platformId);
}
