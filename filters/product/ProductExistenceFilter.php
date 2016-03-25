<?php

namespace app\filters\product;

use Yii;
use app\filters\BaseFilter;
use app\responses\error\InvalidProductResponse;

/**
 * This filter ensures that the product requested by client actually exists.
 *
 * @author Kolyunya
 */
class ProductExistenceFilter extends BaseFilter
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $productExists = $this->validateProductExistence();
        if ($productExists === false) {
            $this->sendInvalidProductResponse();
        }
        return $productExists;
    }

    /**
     * Indicates if the requested product actually exists.
     * @return boolean Returns true if the requested product exists.
     *                 Returns false otherwise.
     */
    private function validateProductExistence()
    {
        $product = Yii::$app->productProxy->getCurrentProduct();
        $productExists = $product !== null;
        return $productExists;
    }

    /**
     * Sends invalid item response to the client.
     */
    private function sendInvalidProductResponse()
    {
        $invalidProductResponse = new InvalidProductResponse();
        $this->sendResponse($invalidProductResponse);
    }
}
