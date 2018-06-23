<?php

namespace InstagramScraper\HttpClient;

class UnirestResponse implements Response {
    /**
     * @var \Unirest\Response
     */
    private $response;

    public function __construct(\Unirest\Response $response) {
        $this->response = $response;
    }

    /**
     * @inheritdoc
     */
    public function getCode() {
        return $this->response->code;
    }

    /**
     * @inheritdoc
     */
    public function getBody() {
        return $this->response->raw_body;
    }

    /**
     * @inheritdoc
     */
    public function getHeader($name) {
        return $this->response->headers[$name];
    }
}
