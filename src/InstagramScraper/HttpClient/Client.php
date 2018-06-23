<?php

namespace InstagramScraper\HttpClient;

interface Client {

    /**
     * @param string $url
     * @param array $headers
     *
     * @return Response
     *
     * @throws HttpException
     */
    public function get($url, array $headers = []);

    /**
     * @param string $url
     * @param mixed  $body
     * @param array $headers
     *
     * @return Response
     *
     * @throws HttpException
     */
    public function post($url, $body, array $headers = []);

}
