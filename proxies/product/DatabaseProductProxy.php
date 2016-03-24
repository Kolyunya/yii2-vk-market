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
     * @inheritdoc
     */
    public function getProductById($id)
    {
        $product = DatabaseProduct::findOne([
            DatabaseProduct::ID_KEY => $id
        ]);
        return $product;
    }

    /**
     * @inheritdoc
     */
    public function getProductByName($name)
    {
        $product = DatabaseProduct::findOne([
            DatabaseProduct::NAME_KEY => $name
        ]);
        return $product;
    }
}
