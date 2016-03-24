<?php

namespace app\proxies\product;

use app\models\product\DatabaseProduct;
use app\proxies\product\BaseProductProxy;

/**
 *
 * @author Kolyunya
 */
class DatabaseProductProxy extends BaseProductProxy
{
    /**
     * @var string
     */
    const PRODUCT_ID_KEY = 'id';

    /**
     * @var string
     */
    const PRODUCT_NAME_KEY = 'name';

    /**
     * @inheritdoc
     */
    public function getProductById($id)
    {
        $product = DatabaseProduct::findOne([
            self::PRODUCT_ID_KEY => $id
        ]);
        return $product;
    }

    /**
     * @inheritdoc
     */
    public function getProductByName($name)
    {
        $product = DatabaseProduct::findOne([
            self::PRODUCT_NAME_KEY => $name
        ]);
        return $product;
    }
}
