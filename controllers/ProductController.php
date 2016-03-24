<?php

namespace app\controllers;

use app\actions\product\GetInfoAction;
use app\controllers\BaseController;

/**
 *
 * @author Kolyunya
 */
class ProductController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'get-info' => GetInfoAction::className(),
        ];
    }
}
