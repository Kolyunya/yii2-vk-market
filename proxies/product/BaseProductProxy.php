<?php

namespace app\proxies\product;

use Yii;
use yii\base\Component;
use app\proxies\product\ProductProxyInterface;

/**
 *
 * @author Kolyunya
 */
abstract class BaseProductProxy extends Component implements ProductProxyInterface
{
    /**
     * Current product.
     * @var ProductInterface
     */
    private $product;

    /**
     * @inheritdoc
     */
    public function getCurrentProduct()
    {
        if ($this->product === null) {
            $productName = Yii::$app->request->getProductName();
            $this->product = $this->getProductByName($productName);
        }
        return $this->product;
    }
}
