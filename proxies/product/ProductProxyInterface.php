<?php

namespace app\proxies\product;

/**
 *
 * @author Kolyunya
 */
interface ProductProxyInterface
{
    /**
     * Returns current product.
     * @return ProductInterface Product.
     */
    public function getCurrentProduct();

    /**
     * Retrieves a product by its id.
     * @param integer $id Product id.
     * @return ProductInterface Product.
     */
    public function getProductById($id);

    /**
     * Retrieves a product by its name.
     * @param string $name Product name.
     * @return ProductInterface Product.
     */
    public function getProductByName($name);
}
