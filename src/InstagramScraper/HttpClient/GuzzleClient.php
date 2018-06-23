<?php

namespace InstagramScraper\HttpClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleClient implements Client {
    /**
     * @var ClientInterface
     */
    private $guzzle;

    /**
     * @param ClientInterface|array $spec `\GuzzleHttp\ClientInterface` instance
     * or array of options for `\GuzzleHttp\Client`
     */
    public function __construct($spec = null) {
        if (is_array($spec)) {
            $this->guzzle = new \GuzzleHttp\Client($spec);
        } elseif ($spec instanceof ClientInterface) {
            $this->guzzle = $spec;
        } elseif ($spec === null) {
            $this->guzzle = new \GuzzleHttp\Client();
        } else {
            throw new \InvalidArgumentException('Unknown constructor argument;'
                . ' array, null or instance of \GuzzleHttp\ClientInterface expected');
        }
    }

    /**
     * @inheritdoc
     */
    public function get($url, array $headers = []) {
        try {
            $rawResponse = $this->guzzle->request('GET', $url, [
                'headers' => $headers,
            ]);
        } catch (GuzzleException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return new GuzzleResponse($rawResponse);
    }

    /**
     * @inheritdoc
     */
    public function post($url, $body, array $headers = []) {
        try {
            $rawResponse = $this->guzzle->request('POST', $url, [
                'body' => $body,
                'headers' => $headers,
            ]);
        } catch (GuzzleException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return new GuzzleResponse($rawResponse);
    }

}
