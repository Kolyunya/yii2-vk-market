<?php

namespace app\models\order;

/**
 *
 * @author Kolyunya
 */
interface OrderInterface
{
    /**
     * @return integer Local order id.
     */
    public function getLocalId();

    /**
     * @return integer Platform order id.
     */
    public function getPlatformId();

    /**
     * @return integer Sender id.
     */
    public function getSenderId();

    /**
     * @return integer Receiver id.
     */
    public function getReceiverId();

    /**
     * @return integer Product id.
     */
    public function getProductId();

    /**
     * @return integer Payment timestamp.
     */
    public function getPaidAt();
}
