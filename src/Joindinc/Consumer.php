<?php

namespace Joindinc;

class Consumer
{
    const JOINDIN_API_URI = 'http://api.joind.in/v2.1';

    /**
     * @var \Zend_Http_Client
     */
    protected $httpClient;

    /**
     * @param \Zend_Http_Client $httpClient
     * @return Consumer
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return \Zend_Http_Client
     */
    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->setHttpClient(new \Zend_Http_Client());
        }
        return $this->httpClient;
    }


}