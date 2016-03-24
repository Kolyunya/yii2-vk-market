<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
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
    public function init()
    {
        $this->setContentType();
    }

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

    /**
     * Sets response content type to JSON.
     */
    private function setContentType()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->charset = 'UTF-8';
    }
}
