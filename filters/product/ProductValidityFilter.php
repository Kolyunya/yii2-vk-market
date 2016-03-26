<?php

namespace app\filters\product;

use Yii;
use app\filters\BaseFilter;
use app\responses\error\InvalidProductResponse;

/**
 * This filter ensures that the product requested by client is consistent.
 *
 * @author Kolyunya
 */
class ProductValidityFilter extends BaseFilter
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $productIsValid = $this->validateProduct();
        if ($productIsValid === false) {
            $this->sendInvalidProductResponse();
        }
        return $productIsValid;
    }

    /**
     * Indicates whether the requested product is valid or not.
     * @return boolean Returns true if the requested product is valid.
     *                 Returns false otherwise.
     */
    private function validateProduct()
    {
        $product = Yii::$app->productProxy->getCurrentProduct();
        $productIdIsValid = $product->getId() === Yii::$app->request->getProductId();
        $productNameIsValid = $product->getName() === Yii::$app->request->getProductName();
        $productPriceIsValid = $product->getPrice() === Yii::$app->request->getProductPrice();
        $productIsValid = $productIdIsValid && $productNameIsValid && $productPriceIsValid;
        return $productIsValid;
    }

    /**
     * Sends invalid item response to the client.
     */
    private function sendInvalidProductResponse()
    {
        $invalidProductResponse = new InvalidProductResponse();
        $this->setResponse($invalidProductResponse);
    }
}
