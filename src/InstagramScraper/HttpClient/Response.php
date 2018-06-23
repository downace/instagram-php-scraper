<?php

namespace InstagramScraper\HttpClient;

interface Response {

    /**
     * @return int
     */
    public function getCode();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @param string $name
     *
     * @return string mixed
     */
    public function getHeader($name);

}
