<?php

namespace app\controllers;

use yii\helpers\ArrayHelper;
use app\actions\order\ProcessAction;
use app\controllers\BaseController;
use app\filters\order\OrderStatusFilter;
use app\filters\product\ProductValidityFilter;

/**
 *
 * @author Kolyunya
 */
class OrderController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'process' => ProcessAction::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $parentBehaviors = parent::behaviors();
        $selfBehaviors = array(
            'order-status-filter' => OrderStatusFilter::className(),
            'product-validity-filter' => ProductValidityFilter::className(),
        );
        $allBehaviors = ArrayHelper::merge($parentBehaviors, $selfBehaviors);
        return $allBehaviors;
    }
}
