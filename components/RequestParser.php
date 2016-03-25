<?php

namespace app\components;

use Yii;
use yii\base\Component;

/**
 *
 * @author Kolyunya
 */
class RequestParser extends Component
{
    /**
     * @const string
     */
    const REQUEST_TYPE_KEY = 'notification_type';

    /**
     * @const string
     */
    const REQUEST_SIGNATURE_KEY = 'sig';

    /**
     * @const integer
     */
    const SENDER_ID_KEY = 'user_id';

    /**
     * @const string
     */
    const RECEIVER_ID_KEY = 'receiver_id';

    /**
     * @const string
     */
    const PRODUCT_ID_KEY = 'item_id';

    /**
     * @const string
     */
    const PRODUCT_NAME_KEY = 'item';

    /**
     * @const integer
     */
    const PRODUCT_PRICE_KEY = 'item_price';

    /**
     * @const integer
     */
    const ORDER_ID_KEY = 'order_id';

    /**
     * @const string
     */
    const ORDER_STATUS_KEY = 'status';

    /**
     * Request payload.
     * @var array
     */
    private $payload;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->initializePayload();
    }

    /**
     * Returns request playload.
     * @return array
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return string Request type.
     */
    public function getRequestType()
    {
        $requestTypeKey = self::REQUEST_TYPE_KEY;
        $requestType = $this->getParameter($requestTypeKey);
        return $requestType;
    }

    /**
     * @return string Request signature.
     */
    public function getRequestSignature()
    {
        $requestSignatureKey = self::REQUEST_SIGNATURE_KEY;
        $requestSignature = $this->getParameter($requestSignatureKey);
        return $requestSignature;
    }

    /**
     * @return integer Client id.
     */
    public function getSenderId()
    {
        $senderIdKey = self::SENDER_ID_KEY;
        $senderIdString = $this->getParameter($senderIdKey);
        $senderId = intval($senderIdString);
        return $senderId;
    }

    /**
     * @return integer Receiver id.
     */
    public function getReceiverId()
    {
        $receiverIdKey = self::RECEIVER_ID_KEY;
        $receiverIdString = $this->getParameter($receiverIdKey);
        $receiverId = intval($receiverIdString);
        return $receiverId;
    }

    /**
     * @return integer Product id.
     */
    public function getProductId()
    {
        $productIdKey = self::PRODUCT_ID_KEY;
        $productIdString = $this->getParameter($productIdKey);
        $productId = intval($productIdString);
        return $productId;
    }

    /**
     * @return string Product name.
     */
    public function getProductName()
    {
        $productNameKey = self::PRODUCT_NAME_KEY;
        $productName = $this->getParameter($productNameKey);
        return $productName;
    }

    /**
     * @return integer Product price.
     */
    public function getProductPrice()
    {
        $productPriceKey = self::PRODUCT_PRICE_KEY;
        $productPriceString = $this->getParameter($productPriceKey);
        $productPrice = intval($productPriceString);
        return $productPrice;
    }

    /**
     * @return integer Order id.
     */
    public function getOrderId()
    {
        $orderIdKey = self::ORDER_ID_KEY;
        $orderIdString = $this->getParameter($orderIdKey);
        $orderId = intval($orderIdString);
        return $orderId;
    }

    /**
     * @return string Order status.
     */
    public function getOrderStatus()
    {
        $orderStatusKey = self::ORDER_STATUS_KEY;
        $orderStatus = $this->getParameter($orderStatusKey);
        return $orderStatus;
    }

    /**
     * Initializes request payload.
     */
    private function initializePayload()
    {
        $application = Yii::$app;
        $request = $application->request;
        $this->payload = $request->post();
    }

    /**
     * Returns request parameter.
     * @param string $key Parameter key.
     * @return mixed Request parameter value.
     */
    private function getParameter($key)
    {
        $parameter = $this->payload[$key];
        return $parameter;
    }
}
