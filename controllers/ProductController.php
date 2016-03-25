<?php

namespace app\controllers;

use app\actions\product\GetAction;
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
            'get' => GetAction::className(),
        ];
    }
}
