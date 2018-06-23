<?php

namespace InstagramScraper\HttpClient;

use Psr\Http\Message\ResponseInterface;

class GuzzleResponse implements Response {
    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response) {
        $this->response = $response;
    }

    /**
     * @inheritdoc
     */
    public function getCode() {
        return $this->response->getStatusCode();
    }

    /**
     * @inheritdoc
     */
    public function getBody() {
        $body = $this->response->getBody()->getContents();
        $this->response->getBody()->rewind();
        return $body;
    }

    /**
     * @inheritdoc
     */
    public function getHeader($name) {
        return $this->response->getHeader($name);
    }
}
