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
    const CLIENT_ID_KEY = 'client_id';

    /**
     * @const string
     */
    const PRODUCT_ID_KEY = 'product_id';

    /**
     * @const string
     */
    const PAID_AT_KEY = 'paid_at';

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
    public function getClientId()
    {
        return $this->getAttribute(self::CLIENT_ID_KEY);
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
    public function getPaidAt()
    {
        return $this->getAttribute(self::PAID_AT_KEY);
    }
}
