<?php

namespace app\controllers;

use app\actions\market\IndexAction;
use app\controllers\BaseController;

/**
 *
 * @author Kolyunya
 */
class MarketController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => IndexAction::className(),
        ];
    }
}
