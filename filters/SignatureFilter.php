<?php

namespace app\filters;

use Yii;
use app\components\RequestParser;
use app\filters\BaseFilter;
use app\responses\error\InvalidSignatureResponse;

/**
 * This filter ensures that request signature provided by client is correct.
 *
 * @author Kolyunya
 */
class SignatureFilter extends BaseFilter
{
    /**
     * Application secret key in application parameters.
     */
    const APPLICATION_SECRET_KEY = 'application-secret';

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $signatureIsValid = $this->validateSignature();
        if ($signatureIsValid === false) {
            $this->sendInvalidSignatureResponse();
        }
        return $signatureIsValid;
    }

    /**
     * Indicates if recieved request signature is correct.
     * @return boolean Returns true if provided request signature is correct.
     *                 Returns false otherwise.
     */
    private function validateSignature()
    {
        $receivedSignature = $this->getReceivedSignature();
        $correctSignature = $this->getCorrectSignature();
        $signatureIsValid = $receivedSignature === $correctSignature;
        return $signatureIsValid;
    }

    /**
     * @return string Request signature received from the client.
     */
    private function getReceivedSignature()
    {
        $receivedSignature = Yii::$app->requestParser->getRequestSignature();
        return $receivedSignature;
    }

    /**
     * @return string Correct request signature calculated locally.
     */
    private function getCorrectSignature()
    {
        // Request signature should be removed before calculation.
        $payload = Yii::$app->requestParser->getPayload();
        $signatureKey = RequestParser::REQUEST_SIGNATURE_KEY;
        unset($payload[$signatureKey]);
        ksort($payload);

        // Perform request signature calculation.
        $correctSignature = '';
        foreach ($payload as $key => $value) {
            $correctSignature .= $key . '=' . $value;
        }
        $applicationSecretKey = self::APPLICATION_SECRET_KEY;
        $applicationSecret = Yii::$app->params[$applicationSecretKey];
        $correctSignature = md5($correctSignature.$applicationSecret);

        return $correctSignature;
    }

    /**
     * Sends invalid signature response to the client.
     */
    private function sendInvalidSignatureResponse()
    {
        $invalidSignatureResponse = new InvalidSignatureResponse();
        $this->setResponse($invalidSignatureResponse);
    }
}
