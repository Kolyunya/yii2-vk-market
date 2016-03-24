<?php

namespace app\responses\success;

use app\models\product\ProductInterface;
use app\responses\SuccessResponse;

/**
 *
 * @author Kolyunya
 */
class ProductInfoResponse extends SuccessResponse
{
    /**
     * @var string
     */
    const PRODUCT_ID_KEY = 'item_id';

    /**
     * @var string
     */
    const PRODUCT_DESCRIPTION_KEY = 'title';

    /**
     * @var string
     */
    const PRODUCT_PRICE_KEY = 'price';

    /**
     * @var string
     */
    const PRODUCT_IMAGE_URL_KEY = 'photo_url';

    /**
     * @var string
     */
    const PRODUCT_EXPIRATION_KEY = 'expiration';

    /**
     * Product.
     * @var ProductInterface
     */
    private $product;

    /**
     * Constructs product info response
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * @inheritdoc
     */
    protected function getResponseContent()
    {
        $responseContent = array();

        // Add product id info
        $idKey = self::PRODUCT_ID_KEY;
        $id = $this->product->getId();
        $responseContent[$idKey] = $id;

        // Add product name info
        $descriptionKey = self::PRODUCT_DESCRIPTION_KEY;
        $description = $this->product->getDescription();
        $responseContent[$descriptionKey] = $description;

        // Add product price info
        $priceKey = self::PRODUCT_PRICE_KEY;
        $price = $this->product->getPrice();
        $responseContent[$priceKey] = $price;

        // Add product image URL info
        $imageUrlKey = self::PRODUCT_IMAGE_URL_KEY;
        $imageUrl = $this->product->getImageUrl();
        $responseContent[$imageUrlKey] = $imageUrl;

        // Add product expiration info
        $expirationKey = self::PRODUCT_EXPIRATION_KEY;
        $expiration = $this->product->getExpiration();
        $responseContent[$expirationKey] = $expiration;

        return $responseContent;
    }
}
