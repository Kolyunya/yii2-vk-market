<?php

namespace app\models\order;

use yii\db\ActiveRecord;
use app\models\order\OrderInterface;

/**
 *
 * @author Kolyunya
 */
class DatabaseOrder extends ActiveRecord implements OrderInterface
{
    /**
     * @const string
     */
    const TABLE_NAME = 'orders';

    /**
     * @const string
     */
    const LOCAL_ID_KEY = 'id';

    /**
     * @const string
     */
    const PLATFORM_ID_KEY = 'platform_id';

    /**
     * @const string
     */
    const SENDER_ID_KEY = 'sender_id';

    /**
     * @const string
     */
    const RECEIVER_ID_KEY = 'receiver_id';

    /**
     * @const string
     */
    const PRODUCT_ID_KEY = 'product_id';

    /**
     * @const string
     */
    const IS_PROCESSED_KEY = 'is_processed';

    /**
     * @const string
     */
    const PROCESSED_AT_KEY = 'processed_at';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @inheritdoc
     */
    public function getLocalId()
    {
        return $this->getAttribute(self::LOCAL_ID_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getPlatformId()
    {
        return $this->getAttribute(self::PLATFORM_ID_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getSenderId()
    {
        return $this->getAttribute(self::SENDER_ID_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getReceiverId()
    {
        return $this->getAttribute(self::RECEIVER_ID_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getProductId()
    {
        return $this->getAttribute(self::PRODUCT_ID_KEY);
    }

    /**
     * @inheritdoc
     */
    public function isProcessed()
    {
        return $this->getAttribute(self::IS_PROCESSED_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getProcessedAt()
    {
        return $this->getAttribute(self::PROCESSED_AT_KEY);
    }

    /**
     * @inheritdoc
     */
    public function setProcessed()
    {
        $this->setAttribute(self::IS_PROCESSED_KEY, true);
        $this->setAttribute(self::PROCESSED_AT_KEY, date('Y-m-d H:i:s'));
        $setSuccessfully = $this->save();
        return $setSuccessfully;
    }
}
