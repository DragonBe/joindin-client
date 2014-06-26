<?php

namespace Joindinc\Users;

class Request
{
    const JOINDIN_ENDPOINT = 'users';
    /**
     * @var \Joindinc\Consumer
     */
    protected $consumer;

    /**
     * @param null | \Joindinc\Consumer $consumer
     */
    public function __construct($consumer = null)
    {
        if (null !== $consumer) {
            $this->setConsumer($consumer);
        }
    }

    /**
     * @param \Joindinc\Consumer $consumer
     */
    public function setConsumer(\Joindinc\Consumer $consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * @return \Joindinc\Consumer
     */
    public function getConsumer()
    {
        if (null === $this->consumer) {
            $this->setConsumer(new \Joindinc\Consumer());
        }
        return $this->consumer;
    }

    /**
     * @return string The URI on which we make our requests
     */
    protected function getEndpoint()
    {
        return sprintf('%s/%s', \Joindinc\Consumer::JOINDIN_API_URI, self::JOINDIN_ENDPOINT);
    }

    public function findUserById($id)
    {
        $client = $this->getConsumer()->getHttpClient();
        $client->setUri($this->getEndpoint() . '/' . $id);
        $response = $client->request();
        $data = json_decode($response->getBody());
        return $data->users[0];
    }
}