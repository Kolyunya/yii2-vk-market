<?php

namespace app\models\client;

/**
 *
 * @author Kolyunya
 */
interface ClientInterface
{
    /**
     * @return integer Client's local id.
     */
    public function getLocalId();

    /**
     * @return integer Client's platform id.
     */
    public function getPlatformId();
}
