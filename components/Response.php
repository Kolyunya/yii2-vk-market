<?php

namespace app\components;

/**
 *
 * @author Kolyunya
 */
class Response extends \yii\web\Response
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setContentType();
    }

    /**
     * Sets response content type to JSON.
     */
    private function setContentType()
    {
        $this->format = Response::FORMAT_JSON;
        $this->charset = 'UTF-8';
    }
}
