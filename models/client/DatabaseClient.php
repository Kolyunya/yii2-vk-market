<?php

namespace app\models\client;

use yii\db\ActiveRecord;
use app\models\client\ClientInterface;

/**
 *
 * @author Kolyunya
 */
class DatabaseClient extends ActiveRecord implements ClientInterface
{
    /**
     * @const string
     */
    const TABLE_NAME = 'client';

    /**
     * @const string
     */
    const LOCAL_ID_KEY = 'id';

    /**
     * @const string
     */
    const PLATFORM_ID_KEY = 'platform_id';

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
}
