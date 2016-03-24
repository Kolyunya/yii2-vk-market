<?php

namespace app\models\product;

use yii\db\ActiveRecord;
use app\models\product\ProductInterface;

/**
 *
 * @author Kolyunya
 */
class DatabaseProduct extends ActiveRecord implements ProductInterface
{
    /**
     * @const string
     */
    const TABLE_NAME = 'products';

    /**
     * @const string
     */
    const ID_KEY = 'id';

    /**
     * @const string
     */
    const NAME_KEY = 'name';

    /**
     * @const string
     */
    const DESCRIPTION_KEY = 'description';

    /**
     * @const string
     */
    const PRICE_KEY = 'price';

    /**
     * @const string
     */
    const IMAGE_URL_KEY = 'image_url';

    /**
     * @const string
     */
    const EXPIRATION_KEY = 'expiration';

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
    public function getId()
    {
        return $this->getAttribute(self::ID_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->getAttribute(self::NAME_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->getAttribute(self::DESCRIPTION_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getPrice()
    {
        return $this->getAttribute(self::PRICE_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getImageUrl()
    {
        return $this->getAttribute(self::IMAGE_URL_KEY);
    }

    /**
     * @inheritdoc
     */
    public function getExpiration()
    {
        return $this->getAttribute(self::EXPIRATION_KEY);
    }
}
