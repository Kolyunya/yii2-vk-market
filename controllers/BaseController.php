<?php

namespace app\controllers;

use yii\web\Controller;
use app\filters\product\ProductExistenceFilter;
use app\filters\ClientFilter;
use app\filters\RequestTypeFilter;
use app\filters\SignatureFilter;

/**
 *
 * @author Kolyunya
 */
class BaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'signature-filter' => SignatureFilter::className(),
            'client-filter' => ClientFilter::className(),
            'request-type-filter' => RequestTypeFilter::className(),
            'product-existence-filter' => ProductExistenceFilter::className(),
        ];
    }
}
