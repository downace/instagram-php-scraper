<?php

namespace InstagramScraper\HttpClient;

use Unirest\Request;

class UnirestClient implements Client {

    /**
     * @inheritdoc
     */
    public function get($url, array $headers = []) {
        try {
            $rawResponse = Request::get($url, $headers);
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return new UnirestResponse($rawResponse);
    }

    /**
     * @inheritdoc
     */
    public function post($url, $body, array $headers = []) {
        try {
            $rawResponse = Request::post($url, $headers, $body);
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return new UnirestResponse($rawResponse);
    }
}
