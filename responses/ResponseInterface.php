<?php

namespace app\responses;

/**
 *
 * @author Kolyunya
 */
interface ResponseInterface
{
    /**
     * Returns response data.
     * @return array
     */
    public function getData();

    /**
     * Converts response to a string.
     * @return string
     */
    public function __toString();
}
