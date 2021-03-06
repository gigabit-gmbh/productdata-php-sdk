<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\Responses;

/**
 * Class AbstractSoapResponse
 */
abstract class AbstractSoapResponse {
    /**
     * @var object $response
     */
    protected $response;

    protected function __construct($response) {
        $this->response = $response;
    }

    /**
     * @return object
     */
    protected function getResponse() {
        return $this->response;
    }

}
