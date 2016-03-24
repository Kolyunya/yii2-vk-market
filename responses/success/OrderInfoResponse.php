<?php

namespace app\responses\success;

use app\models\order\OrderInterface;
use app\responses\SuccessResponse;

/**
 *
 * @author Kolyunya
 */
class OrderInfoResponse extends SuccessResponse
{
    /**
     * @var string
     */
    const ORDER_LOCAL_ID_KEY = 'app_order_id';

    /**
     * @var string
     */
    const ORDER_PLATFORM_ID_KEY = 'order_id';

    /**
     * Order.
     * @var OrderInterface
     */
    private $order;

    /**
     * Constructs order info response.
     * @param OrderInterface Order.
     */
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    /**
     * @inheritdoc
     */
    protected function getResponseContent()
    {
        $responseContent = array();

        // Add local order id
        $localIdKey = self::ORDER_LOCAL_ID_KEY;
        $localId = $this->order->getLocalId();
        $responseContent[$localIdKey] = $localId;

        // Add platform order id
        $platformIdKey = self::ORDER_PLATFORM_ID_KEY;
        $platformId = $this->order->getPlatformId();
        $responseContent[$platformIdKey] = $platformId;

        return $responseContent;
    }
}
