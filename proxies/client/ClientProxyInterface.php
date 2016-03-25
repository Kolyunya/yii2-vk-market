<?php

namespace app\proxies\client;

/**
 *
 * @author Kolyunya
 */
interface ClientProxyInterface
{
    /**
     * Returns current sender.
     * @return ClientInterface Current sender.
     */
    public function getCurrentSender();

    /**
     * Returns current receiver.
     * @return ClientInterface Current receiver.
     */
    public function getCurrentReceiver();

    /**
     * Returns client by his platform id.
     * @param integer $platformId
     * @return ClientInterface Client.
     */
    public function getClientByPlatformId($platformId);
}
