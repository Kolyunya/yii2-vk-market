<?php

namespace app\models\product;

/**
 *
 * @author Kolyunya
 */
interface ProductInterface
{
    /**
     * @return integer Product id.
     */
    public function getId();

    /**
     * @return string Product name.
     */
    public function getName();

    /**
     * @return string Product description.
     */
    public function getDescription();

    /**
     * @return integer Product price.
     */
    public function getPrice();

    /**
     * @return string Product image URL.
     */
    public function getImageUrl();

    /**
     * @return integer Product expiration.
     */
    public function getExpiration();
}
